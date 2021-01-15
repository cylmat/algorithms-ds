<?php
// https://www.geeksforgeeks.org/strassens-matrix-multiplication/
// https://www.intmath.com/matrices-determinants/matrix-multiplication-examples.php

/**
 * Naive method
 */
/*
 Multiply if A cols = B rows
 2x3 * 3x4 => 2x4
*/
function d(...$v) {var_dump(...$v);}

//3x4
$a = [ //4 cols
  [-1,0,-4,3],
  [-2,1, 2,4],
  [-3,5, 6,7]
];

//4x6
$b = [ //4 rows
    [ 8,9, 10,11,6,-4],
    [-2,12,2,-1, 4, 7],
    [-4,0, 1,6,  2, 3],
    [ 3,4, 5,7, -3,-7]
];

/*
 //3x6
 c = [
   [-1*8+0*-2+-4*-4+3*3,  -1*9+0*12+-4*0+3*4,  -1*10+0*2+-4*1+3*5,  -1*11+0*-1+-4*6+3*7,  -1*6+0*4+-4*2+3*-3,  -1*-4+0*7+-4*3+3*-7],
   [-2*8+1*-2+2*-4+4*3,   -2*9+1*12+2*0+4*4,   -2*10+1*2+2*1+4*5,   -2*11+1*-1+2*6+4*7,   -2*6+1*4+2*2+4*-3,   -2*-4+1*7+2*3+4*-7],
   [-3*8+5*-2+6*-4+7*3,   -3*9+5*12+6*0+7*4,   -3*10+5*2+6*1+7*5,   -3*11+5*-1+6*6+7*7,   -3*6+5*4+6*2+7*-3,   -3*-4+5*7+6*3+7*-7]
 ]
*/

/*
 res[A rows][B cols]
*/
function matrix_multiply(array $arra, array $arrb)
{
    $rowA = sizeof($arra);
    $colA = sizeof($arra[0]); //=rowB
    $colB = sizeof($arrb[0]);
    
    $res = [];
    for($a=0; $a<$rowA; $a++) { //A row
        for($b=0; $b<$colB; $b++) { //B cols
            
            $resw[$a][$b] = "";
            $res[$a][$b] = 0;
            for($k=0; $k<$colA; $k++) { //A each col
                $resw[$a][$b] .= $arra[$a][$k]."*".$arrb[$k][$b].' + ';
                $res[$a][$b] += $arra[$a][$k]*$arrb[$k][$b];
            }
        }
    }
    return $res;
}

$mat = matrix_multiply($a, $b);
d($mat);