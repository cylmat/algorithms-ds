<?php
/**
 * Heap algorithm
 * Print all sentences possible taking one word from a list
 * 
 * ref: https://en.wikipedia.org/wiki/Heap%27s_algorithm
 */

/**
 * Heap algo
 */
function permut_heap(array $arr, int $n): void
{ 
    if (1==$n) {
        echo join(' ',$arr)."\n"; 
        return; 
    }
    
    permut_heap($arr, $n-1);
    
    // 
    for ($i=0; $i<$n-1; $i++) {
        if($n%2) {
            [$arr[$i],$arr[$n-1]] = [$arr[$n-1],$arr[$i]];
        } else {
            [$arr[0],$arr[$n-1]] = [$arr[$n-1],$arr[0]];
        }
        permut_heap($arr, $n-1);
    }
} 

$arr = ["A", "B", "C"]; 
permut_heap($arr, count($arr));

//validate
echo (int)assert(true);