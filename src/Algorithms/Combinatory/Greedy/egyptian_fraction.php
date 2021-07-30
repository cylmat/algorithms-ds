<?php

/**
* Egyptian fraction
* Representation of fraction using sum of 1/<integer>
*
* I/O: 12/13 is 1/2 + 1/3 + 1/12 + 1/156
*
* 1) For 6/14, find ceiling of 14/6 which is 3
* 2) Continue with 6/14 - 1/3
*
* ref: https://www.geeksforgeeks.org/greedy-algorithm-egyptian-fraction/
*/
function egyptian_fraction(int $nr, int $dr, $result=[]): array
{
    // if 0
    if ($nr==0 || $dr==0) return $result;
    // fraction of 1/n
    if ($dr % $nr == 0) {
        $result[] = (int)$dr/$nr;
        return $result;
    }
    // integer
    if ($nr % $dr == 0) {
        $result[] = (int)$nr/$dr;
        return $result;
    }
    // others cases
    if ($nr > $dr) {
        $result[] = (int)($nr/$dr);
        return egyptian_fraction($nr % $dr, $dr, $result);
    }
    // dr/nr && $dr%$nr
    $n = (int)($dr / $nr) + 1;
    $result[] = $n;
    return egyptian_fraction($nr * $n - $dr, $dr * $n, $result);
}

$res_ef = egyptian_fraction(12, 13);
$expect_ef = [2, 3, 12, 156];

validates($res_ef,  $expect_ef);
