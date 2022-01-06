<?php
/**
 * Merge sort
 *  - Divides input array in two halves, calls itself for the two halves and then merges the two sorted halves.
 * - divide and conquer
 * 
 * ref: https://www.geeksforgeeks.org/merge-sort
 */

/**************
 * TOP DOWN
 */
function merge_sort(array $array): array
{
    if(1===count($array)) return $array;
    
    $n_split = floor(count($array) / 2);
    $left = merge_sort(array_slice($array, 0, $n_split));
    $right = merge_sort(array_slice($array, $n_split));

    $r = _merge($left, $right);
    return $r;
}

function _merge(array $left, array $right)
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
$arr = [90,32,-8,7,54,1,88,45,23,82,37,78,51,2];
$res = implode(',', merge_sort($arr));

//valid
validates($res, '-8,1,2,7,23,32,37,45,51,54,78,82,88,90'); 
