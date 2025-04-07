<?php

namespace App\Classes;

class CarFeeFactory
{

    /**
     * Creates an instance of a car fee based on the type.
     *
     * @param string $type
     * @return CarFeeInterface
     * @throws \InvalidArgumentException
     */
    static function createCarFee(string $type): CarFeeInterface
    {
        switch ($type) {
            case 'luxury':
                return new LuxuryCarFee();
            case 'common':
                return new CommonCarFee();
            default:
                throw new \InvalidArgumentException("Unknown car fee type: $type");
        }
    }
}
