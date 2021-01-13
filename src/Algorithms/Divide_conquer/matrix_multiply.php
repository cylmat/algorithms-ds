<?php
// D&C
// https://www.geeksforgeeks.org/strassens-matrix-multiplication/
// https://www.intmath.com/matrices-determinants/matrix-multiplication-examples.php
/*
 Multiply if A cols = B rows
 2x3 * 3x4 => 2x4
*/
function d(...$v) {var_dump(...$v);}

//3x4
$a = [ //4 cols
  [-1,0,-4,3],
  [-2,1,2,4],
  [-3,5,6,7]
];

//4x6
$b = [ //4 rows
    [8,9,10,11,6,-4],
    [-2,12,2,-1,4,7],
    [-4,0,1,6,2,3],
    [3,4,5,7,-3,-7]
];

/*
 //3x6
 c = [
   [17,3,1,-14]
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
            for($k=0; $k<$colA; $k++) { //B each col
                $resw[$a][$b] .= $arra[$a][$k]."*".$arrb[$k][$b].' + ';
                $res[$a][$b] += $arra[$a][$k]*$arrb[$k][$b];
            }
        }
    }
    return $res;
}

$mat = matrix_multiply($a, $b);
d($mat);