<?php

/**
 * - Print all possible strings of length k
 * 
 * Input: ['a', 'b'], length = 3
 * print: aaa,aab,aba,abb,baa,bab,bba,bbb
 * 
 * @see https://www.geeksforgeeks.org/print-all-combinations-of-given-length/
 */
$all_combination = '';
function all_combinations(array $arr, int $size_arr, int $length_total, string $out=''): void
{
    global $all_combination;
    
    // base
    if ($length_total==0) {
        $all_combination .= $out."\n";
        return;
    }
    
    for ($i=0; $i<$size_arr; $i++) {
        $setout = $out . $arr[$i];
        all_combinations($arr, $size_arr, $length_total-1, $setout);
    }
}
$arr = ['a','b'];
$length = 3;

all_combinations($arr, count($arr), $length);
$exp = ['aaa','aab','aba','abb','baa','bab','bba','bbb'];
validates (explode("\n", trim($all_combination)), $exp); // ok to display

/**
 * Iteratives way
 * - print aaa, aab ... bbb
 * 
 * @see https://stackoverflow.com/questions/31175503/iteratively-find-all-combinations-of-size-k-of-an-array-of-characters-n-choose
 */
$all_combination_i = '';
function buildStrings_iter(array $root, int $length): void
{
    global $all_combination_i;
    
    // allocate an int array to hold the counts:
    $pos = [0,0,0,0,0];

    // allocate a char array to hold the current combination
    $combo = [];

    // initialize to the first value:
    for ($i = 0; $i < $length; $i++) {
        $combo[$i] = $root[0];
    }

    while (true) {
        // output the current combination:
        $all_combination_i .= implode($combo)."\n";

        // move on to the next combination:
        $place = $length - 1;
        while ($place >= 0) {
            if (++$pos[$place] == count($root)) {
                // overflow, reset to zero
                $pos[$place] = 0;
                $combo[$place] = $root[0];
                $place--; // and carry across to the next value
            }
            else {
                // no overflow, just set the char value and we're done
                $combo[$place] = $root[$pos[$place]];
                break;
            }
        }
        
        if ($place < 0)
            break;  // overflowed the last position, no more combinations
    }
}

buildStrings_iter(['a','b'], 3);

$exp = ['aaa','aab','aba','abb','baa','bab','bba','bbb'];
validates($exp, explode("\n", trim($all_combination_i)));


/**
 * Print all combination of numbers 
 *  - print 12, 13, 14, 15, 23, 24, 25, 34, 35 ...
 * 
 * @see https://www.rosettacode.org/wiki/Combinations#PHP
 */
function combinations_set(array $set = [], int $size = 0): array
{
    if ($size == 0) {
        return [[]];
    }
 
    if ($set == []) {
        return [];
    }
 
    $prefix = [array_shift($set)];
    $result = [];
 
    foreach (combinations_set($set, $size-1) as $suffix) {
        $result[] = array_merge($prefix, $suffix);
    }
 
    foreach (combinations_set($set, $size) as $next) {
        $result[] = $next;
    }
 
    return $result;
}

$res_set = combinations_set(range(0, 2), 3);
validates($res_set, [[0,1,2]]);
