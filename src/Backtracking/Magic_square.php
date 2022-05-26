<?php

/*
 * Magical square
 * @see http://sdz.tdct.org/sdz/le-backtracking-par-l-exemple-resoudre-un-sudoku.html
 */

$list = [1,2,3,4,5,6,7,8,9];

function magical_backtrack(array &$square, array $list): bool {
    if (empty($list)) {
        // on the last case, test if valid or not
        return _magical_check($square);
    }

    // find next free case 
    for ($i=0; $i<=2; $i++) {
        for ($j=0; $j<=2; $j++) {
            if ($square[$i][$j] === 0)
                break(2);
        }
    }

    $count = \count($list);
    // test all possibilities
    for ($c=0; $c<$count; $c++) {
        $last = \array_pop($list);

        // test with current num
        $square[$i][$j] = $last;
        if (magical_backtrack($square, $list)) {
            return true;
        }

        // switch first with last to test all numbers in list
        \array_unshift($list, $last);
    }

    // backtracking if unsuccessful
    $square[$i][$j] = 0;

    return false;
}

function _magical_check(array $square): bool {
    $t0 = \array_sum($square[0]);
    $t1 = \array_sum($square[1]);
    $t2 = \array_sum($square[2]);
    $c0 = $square[0][0] + $square[1][0] + $square[2][0];
    $c1 = $square[0][1] + $square[1][1] + $square[2][1];
    $c2 = $square[0][2] + $square[1][2] + $square[2][2];
    
    $d1 = $square[0][0] + $square[1][1] + $square[2][2];
    $d2 = $square[0][2] + $square[1][1] + $square[2][0];

    if ($t0 === $t1 && $t0 === $t2
        && $t0 === $c0 && $t0 === $c1 && $t0 === $c2
        && $t0 === $d1 && $t0 === $d2) {
        return true;
    }
    return false;
}

$square = [[0,0,0],[0,0,0],[0,0,0]];
magical_backtrack($square, $list);

$expect = [[8,3,4],[1,5,9],[6,7,2]];
validates($expect, $square);
