<?php

/**
 * @ref: https://www.interviewbit.com/tutorial/quicksort-algorithm/
 */

function quickSort(&$array, int $low, int $high): void
{
    if ($low < $high)
    {
        // pivot_index is partitioning index, arr[pivot_index] is now at correct place in sorted array
        $pivot_index = qs_partition($array, $low, $high);

        quickSort($array, $low, $pivot_index - 1);  // Before pivot_index
        quickSort($array, $pivot_index + 1, $high); // After pivot_index
    }
}

/*
 * Method: Put every elements smaller than pivot on the left
 */
function qs_partition (array &$array, int $low, int $high): int
{
    // pivot - Element at right most position
    $pivot = $array[$high];  
    $i = ($low - 1);  // Index of smaller element
    for ($j = $low; $j <= $high-1; $j++)
    {
        // If current element is smaller than the pivot, swap the element with ($i)
        if ($array[$j] < $pivot)
        {
            $i++;    // increment index of smaller element
            [$array[$i], $array[$j]] = [$array[$j], $array[$i]];
        }
    }
    [$array[$i + 1], $array[$high]] = [$array[$high], $array[$i + 1]];
    return ($i + 1);
}

$array = [50, 23, 9, 18, 61, 32];
quickSort($array, 0, count($array)-1);

validates($array, [9, 18, 23, 32, 50, 61]);


// info
/*
tailRecursiveQuicksort($arr, int $start, int $end): void
{
    while ($start < $end)
    {
        $pivot = partition($arr, $start, $end);
 
        // recur on the smaller subarray
        if ($pivot - $start < $end - $pivot)
        {
            tailRecursiveQuicksort($arr, $start, $pivot - 1);
            $start = $pivot + 1;
        }
        else
        {
            tailRecursiveQuicksort($arr, $pivot + 1, $end);
            $end = $pivot - 1;
        }
    }
}
*/


/**
 * Solution 2
 * @ref: https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-1.php
 */

/**
 * Solution 3
 * @ref: https://en.wikipedia.org/wiki/Quicksort
 * @ref: https://fr.wikipedia.org/wiki/Tri_rapide
 */
