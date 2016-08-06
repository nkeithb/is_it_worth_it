<?php namespace App\Services;


class SpendingCalculator
{

    public function multiplyAllAmounts(array $amounts)
    {
        return array_product($amounts);
    }

    public function subtractFromMultipliedArray(array $products, int $subtractedAmount)
    {
        return $this->multiplyAllAmounts($products) - $subtractedAmount;
    }

}