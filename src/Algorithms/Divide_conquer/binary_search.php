<?php
// D&C
//https://www.geeksforgeeks.org/binary-search/


// Driver Code 
$arr = array(2, 3, 4, 10, 40); 

$n = count($arr); 
$x = 10; 
$result = binarySearch($arr, 0, $n - 1, $x); 

function binarySearch($arr, $l, $r, $x)
{
    if ($l<=$r) {
        $m = ceil($r- (($r-$l)/2));

        if ($x<$arr[$m]) {
            return binarySearch($arr, $l, $m-1, $x);
        }
        if ($x>$arr[$m]) {
            return binarySearch($arr, $m+1, $r, $x);
        }
        return $m;
    }
    return -1;
}
 
echos($result !== -1);
