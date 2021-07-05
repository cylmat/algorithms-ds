<?php

function bubble_rec($n, &$a, &$swap, $i, $j): bool //return if a swap append or not
{
    if ($i>$n-2 || $j>$n-1) return false; // $j from $i to last
   
    $current_action=false;
    if ($a[$j-1] > $a[$j]) { //asc
        [$a[$j-1], $a[$j]] = [$a[$j], $a[$j-1]]; //swap
        $swap++;
        $current_action=true;
    }

    $child_action = bubble_rec($n, $a, $swap, $i, $j+1); // check every $j
   
    if ($current_action===false && $child_action===false) {
        //optimisation: if no swap this time, array is sorted
        return false;
    }
    bubble_rec($n, $a, $swap, $i+1, $i+1); // then next $i, reset $j
    return true;
}
