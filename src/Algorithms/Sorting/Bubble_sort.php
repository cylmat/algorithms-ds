<?php

/**
 * Bubble sort
 * 
 * Repeatedly swapping the adjacent elements
 */

/*
 *  I: geeksforgeeks
 *  O: eeeefggkkorss
 * 
 * for one char, switch n-1 <> n, until 0
 * 
 * @ref: https://www.geeksforgeeks.org/bubble-sort/
 */
function string_sort(string $str, int $i): string
{
    if (0==$i) {
        return $str;
    }
    
    //switch @i
    if ($str[$i-1] > $str[$i]) {
        if (!isset($str[$i+1])) { //last char
            $str = substr($str,0,$i-1) . $str[$i] . $str[$i-1];
        } else {
            $str = substr($str,0,$i-1) . $str[$i] . $str[$i-1] . substr($str, $i+1);
        }
        //continue if switched
    }
    $str = string_sort($str, $i-1);
    $str = string_sort($str, $i-1);
    
    return $str;
}

$str = 'geeksforgeeks';
$str_sort = string_sort($str, strlen($str)-1);
validates($str_sort, 'eeeefggkkorss');

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
