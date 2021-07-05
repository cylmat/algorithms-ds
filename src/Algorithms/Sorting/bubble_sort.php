<?php

/**
 * Bubble sort
 * 
 *  I: geeksforgeeks
 *  O: eeeefggkkorss
 * 
 * - ref: https://www.geeksforgeeks.org/sorting-algorithms
 */
// for one char
// switch n-1 <> n
// until 0
function string_sort(string $str, int $i): string
{
    if (0==$i) {
        return $str;
    }
    
    //switch @i
    if ($str{$i-1} > $str{$i}) {
        if (!isset($str{$i+1})) { //last char
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1};
        } else {
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1} . substr($str, $i+1);
        }
        //continue if switched
    }
    $str = string_sort($str, $i-1);
    $str = string_sort($str, $i-1);
    
    // 
    return $str;
}

$str = 'geeksforgeeks';
$str_sort = string_sort($str, strlen($str)-1);

echos($str_sort === 'eeeefggkkorss');




/*
$j take always first element [1]
then from $n-0 to $n-$i, and get smaller to smaller
*/
function bubble($n, &$a)
{
    $swap=0;
    for ($i=0; $i<$n-1; $i++) {
        $swapped=false;
        for ($j=1; $j<$n-$i; $j++) {
            //echo "$i:$j - \n";
            if ($a[$j-1] > $a[$j]) {
                [$a[$j-1], $a[$j]] = [$a[$j], $a[$j-1]];
                $swap++;
                //echo "swapped\n";
                $swapped=true;
            }
            //echo join('.',$a)."\n";
        }
        if (!$swapped) return $swap;
    }
    return $swap;
}
