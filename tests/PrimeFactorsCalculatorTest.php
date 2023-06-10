<?php


use Deg540\PHPTestingBoilerplate\NumberProvider;
use Deg540\PHPTestingBoilerplate\PrimeFactorsCalculator;
use PHPUnit\Framework\TestCase;

class PrimeFactorsCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function get_prime_number_1_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('1');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([]), $result);
    }

    /**
     * @test
     */
    public function get_prime_one_number_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('17');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([17]), $result);
    }

    /**
     * @test
     */
    public function get_prime_two_numbers_repeted_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('4');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([2, 2]), $result);
    }

    /**
     * @test
     */
    public function get_prime_return_two_numbers_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('6');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([2, 3]), $result);
    }

    /**
     * @test
     */
    public function get_prime_return_more_numbers_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('42');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([2, 3, 7]), $result);
    }

    /**
     * @test
     */
    public function get_prime_big_number_test(){
        $numberProvider = Mockery::mock(NumberProvider::class);
        $primerFactorsCalculator = new PrimeFactorsCalculator($numberProvider);
        $numberProvider->shouldReceive('getNumber')->once()->andReturn('524');
        $result = $primerFactorsCalculator->calculate();
        $this->assertEquals(([2, 2, 131]), $result);
    }
}