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

    $r = merge($left, $right);
    return $r;
}

function merge(array $left, array $right)
{
    $res=[];
    while( count($left)>0 || count($right)>0 ) {
        if(empty($right)) {
              $res[] = array_shift($left);
        } elseif(empty($left)) {
              $res[] = array_shift($right);
        } else if(array_slice($left,0,1)<array_slice($right,0,1)) {
            $res[] = array_shift($left);
        } else {
            $res[] = array_shift($right);
        }
    }
    
    return $res;
}
