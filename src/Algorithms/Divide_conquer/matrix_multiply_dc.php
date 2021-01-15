<?php
// D&C
// https://www.geeksforgeeks.org/strassens-matrix-multiplication/
// https://stackoverflow.com/questions/21496538/square-matrix-multiply-recursive-in-java-using-divide-and-conquer
/*
 Multiply if A cols = B rows
 2x3 * 3x4 => 2x4
*/
function d(...$v) {var_dump(...$v);}

//3x4
$a = [ //4 cols
  [-1,0,-4,3,0,0,0,0],
  [-2,1, 2,4,0,0,0,0],
  [-3,5, 6,7,0,0,0,0],
  [0,0, 0,0,0,0,0,0],
  
  [0,0, 0,0,0,0,0,0],
  [0,0, 0,0,0,0,0,0],
  [0,0, 0,0,0,0,0,0],
  [0,0, 0,0,0,0,0,0]
];

//4x6
$b = [ //4 rows
    [ 8,9, 10,11,6,-4,0,0],
    [-2,12,2,-1, 4, 7,0,0],
    [-4,0, 1,6,  2, 3,0,0],
    [ 3,4, 5,7, -3,-7,0,0],
    
    [ 0,0, 0,0, 0,0,0,0],
    [ 0,0, 0,0, 0,0,0,0],
    [ 0,0, 0,0, 0,0,0,0],
    [ 0,0, 0,0, 0,0,0,0],
];

/**
 *  17,3,1,-14
   -14,10,4,17
   -37,61,21,47
*/


/*
 res[A rows][B cols]
*/
function matrixMultiplication(
        array $A, array $B, int $rowA, int $colA, 
        int $rowB, int $colB, int $size): array {

    $C=[];

    if($size==1)
        $C[0][0]= $A[$rowA][$colA]*$B[$rowB][$colB];

    else{

        $newSize= $size/2;
        
        
        //C11
         sumMatrix($C, 

            matrixMultiplication($A, $B, $rowA, $colA, $rowB, $colB, $newSize),
            matrixMultiplication($A, $B, $rowA, $colA+$newSize, $rowB+ $newSize, $colB, $newSize),
        0, 0);

         sumMatrix($C, 

            matrixMultiplication($A, $B, $rowA, $colA, $rowB, $colB + $newSize, $newSize),
            matrixMultiplication($A, $B, $rowA, $colA+$newSize, $rowB+ $newSize, $colB+$newSize, $newSize),
        0, $newSize);

         sumMatrix($C, 

            matrixMultiplication($A, $B, $rowA+ $newSize, $colA, $rowB, $colB, $newSize),
            matrixMultiplication($A, $B, $rowA+ $newSize, $colA+$newSize, $rowB+ $newSize, $colB, $newSize),
        $newSize, 0);

         sumMatrix($C, 

            matrixMultiplication($A, $B, $rowA+ $newSize, $colA, $rowB, $colB+$newSize, $newSize),
            matrixMultiplication($A, $B, $rowA+ $newSize, $colA+$newSize, $rowB+ $newSize, $colB+$newSize, $newSize),
        $newSize, $newSize);
    }

    return $C;

}

function sumMatrix(array &$C, array $A, array $B, int $rowC, int $colC): void {
    $n=sizeof($A);
    for($i =0; $i<$n; $i++){
        for($j=0; $j<$n; $j++)  
            $C[$i+$rowC][$j+$colC]=$A[$i][$j]+$B[$i][$j];
    }

}

$mat = matrixMultiplication($a, $b, 0, 0, 0, 0, sizeof($a));
//d($mat);

foreach($mat as $r) {
    echo implode(',',$r)."\n";
}
