<?php

/**
 * Heap algorithm
 *  - Print all sentences possible taking one word from a list
 * 
 * @see https://en.wikipedia.org/wiki/Heap%27s_algorithm
 */

$heap_result = '';
function Heap_permutation(array $arr, int $n): void
{ 
    global $heap_result;
    
    if (1==$n) {
        $heap_result .= join(' ', $arr)."\n"; 
        return; 
    }
    
    Heap_permutation($arr, $n-1);
    
    // 
    for ($i=0; $i<$n-1; $i++) {
        if ($n%2) {
            [$arr[$i], $arr[$n-1]] = [$arr[$n-1], $arr[$i]];
        } else {
            [$arr[0], $arr[$n-1]] = [$arr[$n-1], $arr[0]];
        }
        Heap_permutation($arr, $n-1);
    }
} 

$arr = ["A", "B", "C"]; 
Heap_permutation($arr, count($arr));

validates(explode("\n", $heap_result), ['A B C', 'B A C', 'C B A', 'B C A', 'C A B', 'A C B']);
