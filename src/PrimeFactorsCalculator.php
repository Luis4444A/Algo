<?php

namespace Deg540\PHPTestingBoilerplate;

class PrimeFactorsCalculator
{
    private NumberProvider $numberProvider;
    public function __construct(NumberProvider $numberProvider)
    {
        $this->numberProvider = $numberProvider;
    }

    private function calculate(): array
    {
        $number = $this->numberProvider->getNumber();
        $primeNumber = [];
        $prime = [];
        for ($i = 2; $i <= $number; $i++) {
            $bool = true;
            for ($j = 2; $j < $i; $j++) {
                if ($i % $j == 0) {
                    $bool = false;
                }
            }
            if ($bool && $number % $i == 0) {
                array_push($primeNumber, $i);
            }
        }
        while ($number > 1) {
            for ($i = 0; $i < count($primeNumber); $i++) {
                while ($number % $primeNumber[$i] == 0 && $number > 1) {
                    array_push($prime, $primeNumber[$i]);
                    $number = $number / $primeNumber[$i];
                }
            }
        }
        return $prime;
    }
}
