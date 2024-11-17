<?php

$num1 = 30;
$num2 = 60;
$num3 = 90; 


echo "Given Numbers: $num1 , $num2 , $num3.<br>";

if ($num1 >= $num2 && $num1 >= $num3) {
    echo "The largest Number is $num1.";
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    echo "The largest Number is $num2.";
} else {
    echo "The largest Number is $num3.";
}
?>
