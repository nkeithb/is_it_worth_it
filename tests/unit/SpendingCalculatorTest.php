<?php

use App\Services\SpendingCalculator;


class SpendingCalculatorTest extends \TestCase
{

    private $calculator;

    public function setUp()
    {
        parent::setUp();

        $this->calculator = app(SpendingCalculator::class);
    }

    public function test_calculator_properly_calculates_given_inputs()
    {
        $amountOne   = 5;
        $amountTwo   = 6;
        $amountThree = 10;

        $calculatedResult = $this->calculator->multiplyAllAmounts([$amountOne, $amountTwo, $amountThree]);
        $this->assertEquals(300, $calculatedResult);
    }

    public function test_value_subtracted_from_product_of_array()
    {
        $amountOne   = 7;
        $amountTwo   = 8;

        $amountToSubtract = 10;

        $calculatedResult = $this->calculator->subtractFromMultipliedArray([$amountOne, $amountTwo], $amountToSubtract);
        $this->assertEquals(46, $calculatedResult);
    }

}
