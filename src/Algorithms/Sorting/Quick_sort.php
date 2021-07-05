<?php

/**
 * QuickSort is a Divide and Conquer algorithm.
 * - Selecting a 'pivot' element from the array and partitioning the other elements into two sub-arrays
 *  
 * ref: https://www.geeksforgeeks.org/quick-sort/
 */

function quicksort(&$a, $l, $r, $p)
{
    $pleft=$l;
    $pright=$r-1;
    $pivalue=$a[$p];

    // swap pivot with far right
    [$a[$p], $a[$r]] = [$a[$r], $a[$p]];
   
    while (true) {
        while ($a[$pleft]<$pivalue) {
            $pleft++;
        }
        while ($a[$pright]>$pivalue && $pright>0) {
            $pright--;
        }
       
        if ($pleft>=$pright) {
            break;
        } else {
            [$a[$pright],$a[$pleft]] = [$a[$pleft],$a[$pright]];

            $pleft++;
            $pright--;
           
        }
    }

    [$a[$pleft], $a[$r]] = [$a[$r], $a[$pleft]]; //swap end

    return $pleft;
}

$a = [7,4,9,2,8,5,1,3];
quicksort($a, 0, count($a), $p);