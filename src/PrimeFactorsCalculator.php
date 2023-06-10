<?php

namespace Deg540\PHPTestingBoilerplate;

class PrimeFactorsCalculator
{
    private NumberProvider $numberProvider;
    public function __construct(NumberProvider $numberProvider)
    {
        $this->numberProvider = $numberProvider;
    }

    function calculate():array{
        $number = $this->numberProvider->getNumber();
        $primeNum = [];
        $prime = [];
        for($i = 2; $i <= $number; $i++) {
            $bool = true;
            for($j = 2; $j < $i; $j++){
                if($i % $j == 0){
                    $bool = false;
                }
            }
            if($bool && $number % $i == 0) {
                array_push($primeNum, $i);
            }
        }
        while($number > 1){
            for($i = 0; $i < count($primeNum); $i++){
                while($number % $primeNum[$i] == 0 && $number > 1){
                    array_push($prime, $primeNum[$i]);
                    $number = $number / $primeNum[$i];
                }
            }
        }
        return $prime;
    }
}