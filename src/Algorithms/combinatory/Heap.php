<?php
/**
 * Heap algorithm
 * Print all sentences possible taking one word from a list
 * 
 * ref: https://en.wikipedia.org/wiki/Heap%27s_algorithm
 */

/**
 * Heap algo
 * ref: https://fr.wikipedia.org/wiki/Algorithme_de_Heap
 */
function heap_permut(array $arr, int $n): void
{ 
    if (1==$n) {
        echo join(' ',$arr)."\n"; 
        return; 
    }
    
    heap_permut($arr, $n-1);
    
    // 
    for ($i=0; $i<$n-1; $i++) {
        if($n%2) {
            [$arr[$i],$arr[$n-1]] = [$arr[$n-1],$arr[$i]];
        } else {
            [$arr[0],$arr[$n-1]] = [$arr[$n-1],$arr[0]];
        }
        heap_permut($arr, $n-1);
    }
} 

$arr = ["A", "B", "C"]; 
heap_permut($arr, count($arr));