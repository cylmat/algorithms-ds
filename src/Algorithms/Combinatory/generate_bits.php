<?php
/**
 * Print all bits combinations 
 *  with string "$out" inside parameters
 * 
 * - print 000,001,010,011,100 ... 111
 */
function bits_str(int $n, string $str='', int $to=0): void
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
bits_str(3);

/*
 * Version with string returned
 *  with string "$out" inside parameters
 * 
 * - return 00 01 10 11.... until max
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
bits_string(3);

/**
 * return array of bits [[00],[01],[10],[11]...] until max length
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
$res1 = bits_array(3);
