<?php

namespace App\Classes;

interface CarFeeInterface
{
    public function calculateTotalCost(float $basePrice): array;
}
