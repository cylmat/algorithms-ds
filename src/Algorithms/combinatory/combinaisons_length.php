<?php
/**
 * COMBINATIONS problems
 */

/**
 * - Print all possible strings of length k
 * 
 * Input: ['a', 'b'], length = 3
 * print: aaa,aab,aba,abb,baa,bab,bba,bbb
 * 
 * ref: https://www.geeksforgeeks.org/print-all-combinations-of-given-length/
 */
function all_combinations(array $arr, int $size_arr, int $length_total, string $out=''): void
{
    // base
    if($length_total==0) {
        echo $out."\n";
        return;
    }
    
    for ($i=0; $i<$size_arr; $i++) {
        $setout = $out . $arr[$i];
        all_combinations($arr, $size_arr, $length_total-1, $setout);
    }
}
$arr = ['a','b'];
$length = 3;
$res_ac = all_combinations($arr, count($arr), $length);

/**
 * iteratives way
 * 
 * ref: https://stackoverflow.com/questions/31175503/iteratively-find-all-combinations-of-size-k-of-an-array-of-characters-n-choose
 */
function buildStrings_i(array $root, int $length): void
{
    // allocate an int array to hold the counts:
    $pos = [0,0,0,0,0];

    // allocate a char array to hold the current combination:
    $combo = [];

    // initialize to the first value:
    for($i = 0; $i < $length; $i++) {
        $combo[$i] = $root[0];
    }

    while(true)
    {
        // output the current combination:
        echo implode($combo)."\n";

        // move on to the next combination:
        $place = $length - 1;
        while($place >= 0)
        {
            if(++$pos[$place] == count($root))
            {
                // overflow, reset to zero
                $pos[$place] = 0;
                $combo[$place] = $root[0];
                $place--; // and carry across to the next value
            }
            else
            {
                // no overflow, just set the char value and we're done
                $combo[$place] = $root[$pos[$place]];
                break;
            }
        }
        if($place < 0)
            break;  // overflowed the last position, no more combinations
    }
}
buildStrings_i(['a','b'], 3);

echo (int)assert(true);