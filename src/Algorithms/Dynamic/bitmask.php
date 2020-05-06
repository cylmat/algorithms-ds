<?php
/**
 * Bitmasking
 * 
 * Given a set, count how many subsets have sum of elements greater than or equal to a given value. 
 * arr: [4, 1, 3]
 * value: 5
 * result: 3 soit [1,4], [3,4] et [4, 1, 3] (110, 101, 111)
 * 
 * ref: https://www.hackerearth.com/fr/practice/algorithms/dynamic-programming/bit-masking/tutorial/
 * ref: https://www.geeksforgeeks.org/bitmasking-and-dynamic-programming-set-1-count-ways-to-assign-unique-cap-to-every-person/
 */

/**
 * Check each bit and 
 */
function bitmask(array $arr, int $value, int $n): int
{
    $count=0;

    // check all bits from 000 .. 111 (for a 3 elements array)
    for ($x=0; $x<(2**$n); $x++) {
        $sum=0;
        // check each [n] in $arr
        for ($k=0; $k<$n; $k++) {
            // if mask is matching current [$n] calculate sum
            if ($x & $arr[$k]) {
                $sum += $arr[$k];
            }
        }
        // if sum greater than $value add it
        if ($sum>=$value) {
            $count++;
        }
    }
    return $count;
}

$arr = [4, 1, 3];
$value = 5;  

$res = bitmask($arr, $value, count($arr));
echo (int)assert(3 === $res);