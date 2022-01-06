<?php

/**
* Assign mice to holes so that the time when the last mouse gets inside a hole is minimized.
*
* @see https://www.geeksforgeeks.org/assign-mice-holes/
*/
function mice_to_holes(array $mice, array $holes): int
{
    sort($mice); sort($holes);
    $max_time = 0;
    
    foreach ($mice as $i => $mouse) {
        //get max time to go to hole
        $time = abs($mice[$i] - $holes[$i]);
        $max_time = max($time, $max_time);
    }
    
    return $max_time;
}
$mice = [4, -7, 2]; 
$holes = [4, 0, 5];
$res_mth = mice_to_holes($mice, $holes);
$expect_mth = 7;

validates ($res_mth, $expect_mth);
