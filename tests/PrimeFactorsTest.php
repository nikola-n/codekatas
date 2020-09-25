<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     *
     * @param $number
     * @param $expected
     */
    public function it_generates_prime_factors_for_1($number, $expected)
    {
        var_dump($number);
        $factors = new PrimeFactors;

        $this->assertEquals($expected, $factors->generate($number));
    }

    ///** @test */
    //public function it_generates_prime_factors_for_2()
    //{
    //    $factors = new PrimeFactors;
    //
    //    $this->assertEquals([2], $factors->generate(2));
    //}
    //
    ///** @test */
    //public function it_generates_prime_factors_for_3()
    //{
    //    $factors = new PrimeFactors;
    //
    //    $this->assertEquals([3], $factors->generate(3));
    //}

    ///** @test */
    //public function it_generates_prime_factors_for_4()
    //{
    //    $factors = new PrimeFactors;
    //
    //    $this->assertEquals([2, 2], $factors->generate(4));
    //}

    //phpunit data providers
    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
        ];
    }
}
