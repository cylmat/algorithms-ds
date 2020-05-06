<?php
/**
 * Print all possible strings of length k
 * 
 * https://www.geeksforgeeks.org/print-all-combinations-of-given-length/
 * set = ['a', 'b'], length = 3
 */
function all_combinations(array $arr, string $out, int $size_arr, int $length_total): void
{
    // base
    if($length_total==0) {
        echo $out."\n";
        return;
    }
    
    for ($i=0; $i<$size_arr; $i++) {
        $setout = $out . $arr[$i];
        all_combinations($arr, $setout, $size_arr, $length_total-1);
    }
}

/**
 * Print all bits combinations
 * with string "$out" inside parameters
 */
function bits_str(int $n, string $str='', $to=0): void
{
    if($n==$to) {
        echo $str."\n";
        return;
    }
    
    $set1 = $str . '0';
    bits_str($n, $set1, $to+1);
    
    $set2 = $str . '1';
    bits_str($n, $set2, $to+1);

    /**
     * or...
     * bits_string($max, $out.'0', $c+1);
     * bits_string($max, $out.'1', $c+1);
     */
}

/*
 * Version with string returned
 * with string "$out" inside parameters
 * 
 * return 00\n 01\n 10\n 11\n.... until max
 */
function bits_string(int $max, string $out='', int $c=0): string
{
    if($max==$c) {
        return $out."\n";
    }

    $s1 = bits_string($max, $out.'0', $c+1);
    $s1 .= bits_string($max, $out.'1', $c+1);
    return $s1;
}



/**
 * return array of bits [00,01,10,11...] until max length
 */
function bits_array(int $max, int $c=1): array
{
    if($c==$max) {
        return ["0","1"];
    }
    
    $out = [];
    //0 first
    foreach (bits_array($max,$c+1) as $bit) {
        $out[] = "0" . $bit;
    }
    
    //1 first
    foreach (bits_array($max,$c+1) as $bit) {
        $out[] = "1" . $bit;
    }
    
    return $out;
}

$arr = ['a','b'];
$length = 3;

 bits_string(3);

$res1 = bits_array(3);
$res_s = bits_str(3);
$res = all_combinations($arr, '', 2, $length);



/**************
 * iteratives way
 * 
 * ref: https://stackoverflow.com/questions/31175503/iteratively-find-all-combinations-of-size-k-of-an-array-of-characters-n-choose
 */
function buildStrings(array $root, int $length): void
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
//buildStrings(['u','i','t'], 3);