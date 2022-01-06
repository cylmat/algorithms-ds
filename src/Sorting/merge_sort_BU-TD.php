<?php

/**
 * Merge sort - Bottom up (iterative)
 * 
 * @see https://en.wikipedia.org/wiki/Merge_sort#Bottom-up_implementation
 */
function bottom_up_merge_sort(array &$array, int $n): void
{
    $beta = [];

    // Make successively longer sorted runs of length 2, 4, 8, 16... until whole array is sorted.
    for ($width = 1; $width < $n; $width = 2 * $width)
    {
        // Array A is full of runs of length width.
        for ($i = 0; $i < $n; $i = $i + 2 * $width)
        {
            // Merge two runs: A[i:i+width-1] and A[i+width:i+2*width-1] to B[]
            // or copy A[i:n-1] to B[] ( if(i+width >= n) )
            $left = \min($i + $width, $n);
            $right = \min($i + 2*$width, $n);
            _bottom_up_merge($array, $i, $left, $right, $beta);
        }

        $array = $beta;
    }
}

function _bottom_up_merge(array &$A = [], int $iLeft, int $iRight, int $iEnd, array &$B = []): void
{
    $i = $iLeft;
    $j = $iRight;
    
    // While there are elements in the left or right runs...
    for ($k = $iLeft; $k < $iEnd; $k++) {
        // If left run head exists and is <= existing right run head.
        if ($i < $iRight && ($j >= $iEnd || $A[$i] <= $A[$j])) {
            $B[$k] = $A[$i];
            $i++;
        } else {
            $B[$k] = $A[$j];
            $j++;
        }
    } 
}

$array = [5, 78, 25, 9, 46, 32]; 
bottom_up_merge_sort($array, \count($array));

validates($array, [5, 9, 25, 32, 46, 78]);
