<?php

namespace Tests\Unit;

use App\Classes\CarFeeFactory;
use PHPUnit\Framework\TestCase;

class CarFeeTest extends TestCase
{

    public function testCommonFeeCalculations(): void
    {
        $carFee = CarFeeFactory::createCarFee('common');
        $expected = [
            'basic' => 39.8,
            'special' => 7.96,
            'associated' => 5.0,
            'storage' => 100.0,
            'totalCost' => 550.76 ,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(398));

        $expected = [
            'basic' => 50.0,
            'special' => 10.02,
            'associated' => 10.0,
            'storage' => 100.0,
            'totalCost' => 671.02,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(501));

        $expected = [
            'basic' => 10.0,
            'special' => 1.14,
            'associated' => 5.0,
            'storage' => 100.0,
            'totalCost' => 173.14,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(57));

        $expected = [
            'basic' => 50.0,
            'special' => 22.0,
            'associated' => 15.0,
            'storage' => 100.0,
            'totalCost' => 1287.0,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(1100));
    }

    public function testLuxuryFeeCalculations(): void
    {
        $carFee = CarFeeFactory::createCarFee('luxury');
        $expected = [
            'basic' => 180.0,
            'special' => 72.0,
            'associated' => 15.0,
            'storage' => 100.0,
            'totalCost' => 2167.0,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(1800));

        $expected = [
            'basic' => 200.0,
            'special' => 40000.0,
            'associated' => 20.0,
            'storage' => 100.0,
            'totalCost' => 1040320.0,
        ];
        $this->assertEquals($expected, $carFee->calculateTotalCost(1000000));
    }
}
