<?php

namespace App\Classes;

class LuxuryCarFee extends AbstractCarFee implements CarFeeInterface
{
    protected float $basicFeeMin = 25.0;
    protected float $basicFeeMax = 200.0;
    protected float $specialFee = 4.0;
}
