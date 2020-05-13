<?php
/**
 * Knuth–Morris–Pratt - Pattern Searching
 * Prints all occurrences of pattern in a string
 * 
 * Input:  txt =  "AABAACAADAABAABA",   pattern =  "AABA"
 * Output: Pattern found at index [0, 9 and 12]
 *
 * ref: https://www.geeksforgeeks.org/naive-algorithm-for-pattern-searching/
 */
 
if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

function pattern_search(string $pat, string $str, &$res=[], int $p=0, int $s=0): bool
{
    // end of pattern, pattern founded!
    //include it in result
    if ($p==strlen($pat)) {
        $res[$s-strlen($pat)] = true;
        return true; //all char is matching
    }
    
    //end of string, nothing found
    if ($s==strlen($str)) {
        return false; //end of string
    }
    
    //try next string char
    //begin with first of pattern
    pattern_search($pat, $str, $res, 0, $s+1); //each char of string
    
    //test if current string char is matching current pattern char
    if ($str{$s} == $pat{$p}) {
        //if matching, continue on next pattern char
        //return true only if end of pattern reached
        return pattern_search($pat, $str, $res, $p+1, $s+1); //test pattern
    }
    
    return false;
}

$txt = "AABAACAADAABAABA"; 
$pat = "AABA";
$res = []; //result
pattern_search($pat, $txt, $res);
ksort($res);

echo (int)assert(array_keys($res)==[0,9,12]);