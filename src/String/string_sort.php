<?php

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