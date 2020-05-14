<?php
/**
 * Insertion sort
 *  - Works the way we sort playing cards in our hands.
 * 
 * ref: https://www.geeksforgeeks.org/insertion-sort
 */

if (!function_exists('d')) { function d($v){ return;var_dump($v); }}

/**
 * Iterative
 */
function triInsertionIter($a)
{
    //save key the second
    //  foreach 1..key-1 
    for ($i=1; $i<count($a); $i++) { //echo "i $i:{$a[$i]}\n";
        $key=$a[$i];
        //if key < previous push previous forward
        for ($j=$i; $j>0 && $a[$j-1]>$key; $j--) { // echo "j $j:{$a[$j]}\n";
                $a[$j]=$a[$j-1];    
        }
        $a[$j] = $key;
    }
    return $a;
}

$a = [56,12,42,8,57,93,2,16,17,49,85];
$r = triInsertionIter($a);

echo (int)assert(true);