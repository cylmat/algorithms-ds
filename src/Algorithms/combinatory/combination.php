<?php
/**
 * Print all rotations of binary
 * ex: 0,1 => 00 01 10 11 000 etc... 
 * 
 * ref: https://www.rosettacode.org/wiki/Combinations#PHP
 */
function combinations_set($set = [], $size = 0) {
    if ($size == 0) {
        return [[]];
    }
 
    if ($set == []) {
        return [];
    }
 
    $prefix = [array_shift($set)];
    $result = [];
 
    foreach (combinations_set($set, $size-1) as $suffix) {
        $result[] = array_merge($prefix, $suffix);
    }
 
    foreach (combinations_set($set, $size) as $next) {
        $result[] = $next;
    }
 
    return $result;
}

function combination_integer($n, $m) {
    return combinations_set(range(0, $n-1), $m);
}
$r=combination_integer(5, 3);


/**
 * Print all binary iterative way
 * 
 * 00
 * 01
 * 10
 * 11
 */
$out = '';
$t =['0','1'];

for($y=0; $y<2; $y++) {
    for($z=0; $z<2; $z++) {
        for($j=0; $j<2; $j++) {
            for($c=0; $c<2; $c++) {
                $out .= $t[$y] . $t[$z] . $t[$j] . $t[$c] . "\n";
            }
        }
    }
}