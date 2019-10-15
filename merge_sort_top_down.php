<?php
/*
 REcursive
 O(n.log n) in time
 Bad memory complexity
*/

$array = array(90,32,-8,7,54,1,88,475,23,-56,82,37,783,512,2);
echo implode(', ',$array ).PHP_EOL."sorted:".implode(', ',merge_sort($array));

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
