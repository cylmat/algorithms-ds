<?php

$input1 = [52,85,23,99, 71,34];
$input2 = [99,52,85,23,71,34];
$input3 = [52,85,23,71,34,99];

function getMax($array, $i) 
{
    if($i==0) {return $array[0];}
    
    $next = $array[$i];
    $rec = getMax($array, $i-1);
    
    return max($next, $rec); //test & res
}

echo getMax($input1, 5);
echo getMax($input2, 5);
echo getMax($input3, 5);
