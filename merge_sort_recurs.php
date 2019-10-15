<?php
// Your code here!

$test_array = array(100, 54, 7, 22, 5, 49, 1);
echo "Original Array : ";
echo implode(', ',$test_array );
echo "\nSorted Array :";
echo implode(', ',merge_sort($test_array))."\n";

function merge_sort(array $array)
{
    if(1===count($array)) return $array;
    
    $n_split = floor(count($array) / 2);
    
    $left = merge_sort(array_slice($array, 0, $n_split));
    $right = merge_sort(array_slice($array, $n_split));
    //print_r(merge($left, $right));
    $r = merge($left, $right);
    //print_r($r);
    return $r;
}

function merge(array $left, array $right)
{
    return array_merge($left,$right);
}
