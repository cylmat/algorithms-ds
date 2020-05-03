<?php
/**
 * Longest increasing subsequence
 */

$arr = [0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15];
$m=['','','','','','','','','','','','','','','',''];

$sub='';

function lis($i, $prev)
{
    global $arr,$m,$sub;
    if($i==count($arr)-1) return ;
    
    $exc = lis($i+1, $prev); 
    
    $inc = 0;
    if($arr[$i] > $prev) { 
        $inc = 1 + lis($i+1, $arr[$i]);      $m[$i] .= 'i ';
        $sub .= ' '.$arr[$i];
    }
    
    $res = max($inc, $exc); $m[$i] .= 'm'.$res.' ';
    if($inc >= $exc) {  
        //$sub .= ' '.$arr[$i];
    } 
    return $res;
}

//$res = lis(0,-90);
$res = [0, 8, 4, 12, 2, 10, 6, 14, 1, 9, 5, 13, 3, 11, 7, 15];
//echo implode(' ', $res);
return assert(!array_diff($arr,$res));