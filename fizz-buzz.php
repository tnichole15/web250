<?php

  $num = 1;

  while ($num <= 100) {
    
    if ($num % 3 == 0 && $num % 5 == 0) {
      print('Fizzbuzz');
    }
    elseif($num % 5 == 0) {
      print('Buzz');
    }
    elseif ($num % 3 == 0) {
      print('Fizz');
    }
    else {
      print($num);
    };
    
    echo '<br>';

    $num++;
  };

?>



<!-- 
  Instructions:

  Print all numbers 1 - 100 
  -- replace all multiples of 3 with 'Fizz'
  -- replace all multiples of 5 with 'Buzz'
  -- replace all multiples of 3 AND 5 with 'FizzBuzz' 

  Notes: 
  pg. 495: example that calculates variable divisibility:
    ( ($year % 4 == 0) and (($year % 100 != 0) or ($year %400 == 0)) 
  pg. 664
    Instead of:                   Use the shortcut operator:
    $count = $count + 1;               $count++;
    $count = $count - 1;               $count—;
    $value = $value + $number;         $value += $number;
    $value = $value - $number;         $value -= $number;
    $value = $value * $number;         $value *= $number;
    $value = $value / $number;         $value /= $number;
    $value = $value % $number;         $value %= $number

  ++ adds 1, -- subtracts 1, modulus (%) calculates remainder of division.
-->
