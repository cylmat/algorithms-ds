<?php
/**
 * Bitmasking
 * 
 * pb: Given a set, count how many subsets have sum of elements greater than or equal to a given value. 
 * arr:   [4, 1, 3];
 * value: 5;  
 * result:[1,4], [3,4] 
 */

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

function bitmask(array $arr, int $value, int $n)
{
    $count=0;
    // check all bits from 0..7
    for($x=0; $x<(2**$n); $x++) {
        $sum=0;
        // check each n in array
        for($k=0; $k<$n; $k++) {
            // mask
            d($x.'&'.$arr[$k]);
            if($x & $arr[$k]) {
                $sum += $arr[$k];
                d('yy'.$sum);
            }
        }
        if($sum>=$value) {
            d('yyy sum total:'.$sum);
            $count++;
        }
    }
    return $count;
}

$arr = [4, 1, 3];
$value = 5;  

$res = bitmask($arr, $value, count($arr));
echo (int)assert($res===3);
