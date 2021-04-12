<?php
/**
 * Longest Increasing Subsequence
 * 
 * Input  : arr[] = {3, 10, 2, 1, 20}
 * Output : 3
 *  -> 3, 10, 20
 * 
 * - dynamic
 * 
 * ref: https://www.geeksforgeeks.org/longest-increasing-subsequence-dp-3/
 */

function lis(array $arr, int $i, int $prev): int
{
    //base case
    if($i==count($arr)-1) {
        return 0;
    }
    
    $exc = lis($arr, $i+1, $prev); 
    
    $inc = 0;
    if($arr[$i] > $prev) { 
        $inc = 1 + lis($arr, $i+1, $arr[$i]);
    }
    
    $res = max($inc, $exc); 
    return $res;
}
$arr = [0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15];
$res = lis($arr,0,-max($arr));

//valid
echos($res === 5);
