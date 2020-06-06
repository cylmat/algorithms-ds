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


/**
 * Insertion Sort
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
    
    //switch
    if ($str{$i-1} > $str{$i}) {
        if (!isset($str{$i+1})) {
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1};
        } else {
            $str = substr($str,0,$i-1) . $str{$i} . $str{$i-1} . substr($str, $i+1);
        }
    }
    
    // 
    return string_sort($str, $i-1);
}

$str_sort = 'geeksforgeeks';
for ($i=0; $i<strlen($str_sort); $i++) {
    $str_sort = string_sort($str_sort, strlen($str_sort)-1);
}

//res
echo (int)assert(true && $str_sort == 'eeeefggkkorss');
