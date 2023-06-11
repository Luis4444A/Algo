<?php

namespace PHPTestingBoilerplate;

use Deg540\PHPTestingBoilerplate\NumberProvider;
use Deg540\PHPTestingBoilerplate\PrimeFactorsCalculator;
use PHPUnit\Framework\TestCase;

class PrimeFactorsCalculatorTest extends TestCase
{
    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeNumber1Test()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('1');
        $result = $primerFactors->calculate();
        $this->assertEquals(([]), $result);
    }

    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeOneNumberTest()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('17');
        $result = $primerFactors->calculate();
        $this->assertEquals(([17]), $result);
    }

    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeTwoNumbersRepeatedTest()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('4');
        $result = $primerFactors->calculate();
        $this->assertEquals(([2, 2]), $result);
    }

    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeReturnTwoNumbersTest()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('6');
        $result = $primerFactors->calculate();
        $this->assertEquals(([2, 3]), $result);
    }

    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeReturnMoreNumbersTest()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('42');
        $result = $primerFactors->calculate();
        $this->assertEquals(([2, 3, 7]), $result);
    }

    /**
     * @test
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function getPrimeBigNumberTest()
    {
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactors = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('524');
        $result = $primerFactors->calculate();
        $this->assertEquals(([2, 2, 131]), $result);
    }
}
