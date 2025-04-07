<?php

namespace App\Classes;

class AbstractCarFee
{
    protected float $basicFee = 10.0;
    protected float $basicFeeMin;
    protected float $basicFeeMax;
    protected float $specialFee;
    protected float $storageFee = 100.0;

    protected array $associatedCost = [
        ['min' => 1, 'max' => 500, 'fee' => 5],
        ['min' => 501, 'max' => 1000, 'fee' => 10],
        ['min' => 1001, 'max' => 3000, 'fee' => 15],
        ['min' => 3001, 'max' => PHP_INT_MAX, 'fee' => 20]
    ];

    /**
     * Calculate the total cost and all associated fees.
     * @param float $basePrice
     * @return array
     * @throws \Exception
     */
    public function calculateTotalCost(float $basePrice): array
    {
        $basicFee = $this->calculateBasicFee($basePrice);
        $specialFee = $this->calculateSpecialFee($basePrice);
        $addedCost = $this->calculateAssociatedCost($basePrice);

        return  [
            'basic' => $basicFee,
            'special' => $specialFee,
            'associated' => $addedCost,
            'storage' => $this->storageFee,
            'totalCost' => round($basePrice + $basicFee + $specialFee + $addedCost + $this->storageFee,2)
        ];
    }

    /**
     * Calculate the basic fee based on the base price.
     * @param float $basePrice
     * @return float
     */
    private function calculateBasicFee(float $basePrice): float
    {
        $basicFee = $basePrice * $this->basicFee / 100;

        if ($basicFee < $this->basicFeeMin) {
            return $this->basicFeeMin;
        } elseif ($basicFee > $this->basicFeeMax) {
            return $this->basicFeeMax;
        }
        return round($basicFee, 2);
    }

    /**
     * Calculate the special fee based on the base price.
     * @param float $basePrice
     * @return float
     */
    private function calculateSpecialFee(float $basePrice): float
    {
        return round($basePrice * $this->specialFee / 100, 2);
    }

    /**
     * Calculate the associated cost based on the base price.
     * @param float $basePrice
     * @return float
     * @throws \Exception
     */
    private function calculateAssociatedCost(float $basePrice): float
    {
        $associatedCost = 0;
        foreach ($this->associatedCost as $tier) {
            if ($basePrice >= $tier['min'] && ($basePrice <= $tier['max'])) {
                $associatedCost += $tier['fee'];
                return round($associatedCost, 2);
            }
        }
        throw new \Exception('Invalid fee structure');
    }
}
