<?php

/**
 * Bubble sort
 * 
 * Repeatedly swapping the adjacent elements
 */

/*
$j take always first element [1]
then from $n-0 to $n-$i, and get smaller to smaller
*/
function bubble(&$a, $n): bool
{
    $swap=0;
    // read all values
    for ($i=0; $i<$n-1; $i++) {
        $swapped=false;
        // read all values from $i
        for ($j=1; $j<$n-$i; $j++) {
            // compare and switch
            if ($a[$j-1] > $a[$j]) {
                [$a[$j-1], $a[$j]] = [$a[$j], $a[$j-1]];
                $swap++;
                $swapped=true;
            }
        }
        if (!$swapped) return $swap;
    }
    return $swap;
}

$array = [8,4,9,66,57,1,23];
bubble($array, count($array));

validates($array, [1,4,8,9,23,57,66]);
