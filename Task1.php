<?php

class Task1 {
    function sumDigits($digits) {
        for ($i=0; $i < count($digits); $i++) { 
            $sum_digits += $digits[$i];
        }
        return $sum_digits;
    }
    function find_numbers($n_max, $max_number) {
        $numbers = [];
        for ($i = 1000; $i <= $max_number; $i++) {
            
            $digits = str_split($i);
            
            
            if ($this->sumDigits($digits) <= $n_max) {
                $numbers[] = $i;
            }
        }
        $numbers = array_unique($numbers);
        return $numbers;
    }
    function sum_numbers($numbers) {
        for ($i=0; $i < count($numbers); $i++) { 
            $sum_numbers += $numbers[$i];
        }
        return $sum_numbers;
    }
    function find_close_to_avg($numbers) {
        $sum_numbers = $this->sum_numbers($numbers);
        $avg_numbers = $sum_numbers / count($numbers);
        $closest = 0;
        $min_diff = PHP_INT_MAX;
        foreach ($numbers as $number) {
            $diff = abs($number - $avg_numbers);
    
            if ($diff < $min_diff) {
                $min_diff = $diff;  
                $closest = $number;  
            }
        }
        return $closest;
    }
    function max_sumDig($max_number, $n_max) {
        $numbers = $this->find_numbers($n_max, $max_number);
        $count_numbers = count($numbers);
        $closest_to_avg = $this->find_close_to_avg($numbers);
        $sum_numbers = $this->sum_numbers($numbers);
        $result[] = $count_numbers;
        $result[] = $closest_to_avg;
        $result[] = $sum_numbers;
        print_r($result);
    }
}

$digits = new Task1();
$digits->max_sumDig(3000, 7);