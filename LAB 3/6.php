<?php

$numbers = array(30, 40, 50, 60, 70, 80, 90, 100);
$searchElement = 50;
$found = false;

for ($i = 0; $i < count($numbers); $i++) 
{
    if ($numbers[$i] == $searchElement) 
    {
        echo "Element $searchElement found at index $i.<br>";
        $found = true;
        break;
    }
}


if (!$found) 
{
    echo "Element $searchElement is not in the array.<br>";
}
?>
