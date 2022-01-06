<?php
/**
 * Insertion sort
 *  - Works the way we sort playing cards in our hands.
 * 
 * ref: https://www.geeksforgeeks.org/insertion-sort
 */

/**
 * Iterative
 */
function triInsertionIter($a): array
{
    //save key the second
    //  foreach 1..key-1 
    for ($i=1; $i<count($a); $i++) {
        $key=$a[$i];
        //if key < previous push previous forward
        for ($j=$i; $j>0 && $a[$j-1]>$key; $j--) {
            $a[$j]=$a[$j-1];    
        }
        $a[$j] = $key;
    }
    return $a;
}

$a = [56,12,42,8,57,93,2,16,17,49,85];
$r = triInsertionIter($a);

//res
validates ($r, [2,8,12,16,17,42,49,56,57,85,93]);


/************
 insert 
*/
function insertionSortRec(&$arr, $n): void
{
    if ($n <= 1) return;
  
    insertionSortRec($arr, $n - 1); //sort all 0 to n-1
  
    // Insert last element at position
    $last = $arr[$n - 1];
    $j = $n - 2;
  
    // Move element from j..0, while greater than key
    while ($j >= 0 && $arr[$j] > $last) {
        $arr[$j + 1] = $arr[$j];
        $j--;
    }
    $arr[$j + 1] = $last;
}

$a = [56,12,42,8,57,93,2,16,17];
insertionSortRec($a, count($a));

validates([2, 8, 12, 16, 17, 42, 56, 57, 93], $a);