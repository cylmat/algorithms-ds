<?php

/**
 * Print all bits combinations 
 *  with string "$out" inside parameters
 * 
 * - print 000,001,010,011,100 ... 111
 */
$bits_results = '';
function bits_str(int $n, string $str='', int $to=0): void
{
    global $bits_results;

    if ($n==$to) {
        $bits_results .= "$str ";
        return;
    }
    
    $set1 = $str . '0';
    bits_str($n, $set1, $to+1);
    
    $set2 = $str . '1';
    bits_str($n, $set2, $to+1);

}
bits_str(3);
validates ($bits_results, "000 001 010 011 100 101 110 111 ");

/*
 * Version with string returned
 *  with string "$out" inside parameters
 * 
 * - return 00 01 10 11.... until max
 */
function bits_string(int $max, int $c=0, string $out=''): string
{
    if ($max==$c) {
        return "$out ";
    }

    $s1 = bits_string($max, $c+1, $out.'0');
    $s1 .= bits_string($max, $c+1, $out.'1');
    
    return $s1;
}
$res = bits_string(3);
validates($res, "000 001 010 011 100 101 110 111 ");

/**
 * return array of bits [[00],[01],[10],[11]...] until max length
 */
function bits_array(int $max, int $c=1): array
{
    if ($c==$max) {
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
$res1 = bits_array(3);
validates($res1, ["000", "001", "010", "011", "100", "101", "110", "111"]);
