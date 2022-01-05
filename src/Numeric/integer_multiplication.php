<?php

/**
 * integer multiplication NAIVE
 * @todo use it with karatsuba in D&C algorithm
 *
 * @see https://www.geeksforgeeks.org/multiply-large-numbers-represented-as-strings/?ref=lbp
 */

$int1 = '1254';
$int2 = '0652'; // 1254 * 652 = 817 608
$must_be = 817608;

/*
 * 123
 *  25
 */
function int_multiply(string $inta, string $intb): string
{
    $sizea = strlen($inta);
    $sizeb = strlen($intb);
    
    //result position
    $result=array_fill(0, $sizea+$sizeb, 0);
    $ia=0;
    
    for ($a=$sizea-1; $a>=0; $a--) {
        $carry=0; 
        $ib=0;
       
        for ($b=$sizeb-1; $b>=0; $b--) {
            $res = $inta[$a] * $intb[$b]; //pose resultat
            $pose = $res % 10 + $carry;
            $carry = floor($res / 10); //retenue
            
            $sum = $result[$ia+$ib] + $pose;
            
            $result[$ia+$ib] = $sum ; //$sum % 10
            $ib++;
            
        }
        $result[$ia+$ib] += $carry;
        $ia++;
    }
    
    //generate result
    $string=''; 
    $carry=0;
    
    foreach(($result) as $s) {
        $pose = $s % 10 + $carry;
        $carry = floor($s / 10);
        $string .= $pose;
    }
    return strrev(rtrim($string, '0'));
}

$res = (int)int_multiply($int1, $int2);

validates($res, $must_be);
