<?php
// @see https://www.geeksforgeeks.org/n-queen-problem-backtracking-3/

$board = \array_map(fn() => \array_fill(0, 8, 0), \range(0, 7));
function queens_display(array $board) { \array_walk($board, fn($v) => printf("%s\n", implode(',', $v))); }

function queens_backtrack(array &$board, int $col=0): bool {
    if ($col > 7) return true;

    for ($row=0; $row<=7; $row++) {
        if (_queens_valid($board, $row, $col)) {
            $board[$row][$col] = 1; // place queen
            
            if (queens_backtrack($board, $col+1)) {
                return true;
            }
            $board[$row][$col] = 0; // reset
        }
    }

    return false;
}

function _queens_valid(array $board, int $row, int $col): bool {
    for ($j=0; $j<$col; $j++) { // same col
        if ($board[$row][$j]) { // queen exists
            return false;
        }
    }
    
    for ($i=$row, $j=$col; $i>=0 && $j>=0; $i--, $j--) { // upper diag
        if ($board[$i][$j]) { 
            return false;
        }
    }
    
    for ($i=$row, $j=$col; $i<8 && $j>=0; $i++, $j--) { // lower diag
        if ($board[$i][$j]) { 
            return false;
        }
    }
    return true;
}

queens_backtrack($board);

$expect = [
[1,0,0,0,0,0,0,0],
[0,0,0,0,0,0,1,0],
[0,0,0,0,1,0,0,0],
[0,0,0,0,0,0,0,1],
[0,1,0,0,0,0,0,0],
[0,0,0,1,0,0,0,0],
[0,0,0,0,0,1,0,0],
[0,0,1,0,0,0,0,0]
];

validates ($expect, $board); 
