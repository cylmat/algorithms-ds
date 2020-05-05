<?php
/**
 * Print all possible strings of length k
 * 
 * https://www.geeksforgeeks.org/print-all-combinations-of-given-length/
 * set = ['a', 'b'], length = 3
 */
$arr = ['a','b'];
$length = 3;

function all_combinations(array $arr, string $out, int $size_arr, int $length_total)
{
    // base
    if($length_total==0) {
        echo $out."\n";
        return;
    }
    
    for ($i=0; $i<$size_arr; $i++) {
        $setout = $out . $arr[$i];
        all_combinations($arr, $setout, $size_arr, $length_total-1);
    }
}
 
$res = all_combinations($arr, '', 2, $length);
echo 1;

/**
 * print all bits combinations
 */
function bits($n, string $out='', $to=0)
{
    if($n==$to) {
        echo $out."\n";
        return;
    }
    
    $set = $out . '0';
    bits($n, $set, $to+1);
    
    $set = $out . '1';
    bits($n, $set, $to+1);
}
echo bits(3);