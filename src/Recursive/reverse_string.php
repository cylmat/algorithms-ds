<?php 
/**
 * Reverse string
 * 
 * - recursion
 * 
 * ref: https://www.geeksforgeeks.org/reverse-a-string-using-recursion/
 */
function reverse_string_rec(string $arr, string $out=''): string
{ 
    if (strlen($arr)==0) return $out;
    
    $out .= substr($arr,-1,1);
    return reverse_string_rec(substr($arr,0,strlen($arr)-1), $out);
} 

$str = "alphabeta"; 
$res = reverse_string_rec($str);

validates ($res, 'atebahpla'); 
