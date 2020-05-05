<?php 
/**
 * Reverse string
 * 
 * - recursion
 * https://www.geeksforgeeks.org/reverse-a-string-using-recursion/
 */
function reverse(string $arr, string $out=''): string
{ 
    if (strlen($arr)==0) return $out;
    
    $out .= substr($arr,-1,1);
    return reverse(substr($arr,0,strlen($arr)-1), $out);
} 

$str = "alphabeta"; 
echo (int)assert(reverse($str)==='atebahpla'); 