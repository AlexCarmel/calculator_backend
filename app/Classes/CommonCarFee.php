<?php

namespace App\Classes;

class CommonCarFee extends AbstractCarFee implements CarFeeInterface
{
    protected float $basicFeeMin = 10.0;
    protected float $basicFeeMax = 50.0;
    protected float $specialFee = 2.0;
}
