<?php
/**
* itération
*
*
*
*
*
*
*/
/*function bottomUpMergeSort(inputArray) {
    var length = inputArray.length,
        size = 1,
        temp = []; //allocate space just once

    for (size; size < length; size = size*2) {
        var low = 0;

        for(low; low < length-size; low += size*2) {
            var mid = low + size - 1,
                high = Math.min(low + (size*2 - 1), length -1);

            ArraySort.merge(inputArray, temp, low, mid, high);
        }
    }

    return inputArray;
}
*/





/* copy from wikipedia: to implement in php */
/*void BottomUpMergeSort(A[], B[], n)
{
    // Each 1-element run in A is already "sorted".
    // Make successively longer sorted runs of length 2, 4, 8, 16... until whole array is sorted.
    for (width = 1; width < n; width = 2 * width)
    {
        // Array A is full of runs of length width.
        for (i = 0; i < n; i = i + 2 * width)
        {
            // Merge two runs: A[i:i+width-1] and A[i+width:i+2*width-1] to B[]
            // or copy A[i:n-1] to B[] ( if(i+width >= n) )
            BottomUpMerge(A, i, min(i+width, n), min(i+2*width, n), B);
        }
        // Now work array B is full of runs of length 2*width.
        // Copy array B to array A for next iteration.
        // A more efficient implementation would swap the roles of A and B.
        CopyArray(B, A, n);
        // Now array A is full of runs of length 2*width.
    }
}*/

//  Left run is A[iLeft :iRight-1].
// Right run is A[iRight:iEnd-1  ].
/*void BottomUpMerge(A[], iLeft, iRight, iEnd, B[])
{
    i = iLeft, j = iRight;
    // While there are elements in the left or right runs...
    for (k = iLeft; k < iEnd; k++) {
        // If left run head exists and is <= existing right run head.
        if (i < iRight && (j >= iEnd || A[i] <= A[j])) {
            B[k] = A[i];
            i = i + 1;
        } else {
            B[k] = A[j];
            j = j + 1;    
        }
    } 
}*/ 


/*
 Good for sort lists

 Recursive
 Time: O(n.log n)
 Memory: O(n) for array and O(1) for list
*/


/**************
 * TOP DOWN
 */
$array = array(90,32,-8,7,54,1,88,475,23,-56,82,37,783,512,2);
echo implode(', ',$array ).PHP_EOL."sorted:".implode(', ',merge_sort($array));

function merge_sort(array $array)
{
    if(1===count($array)) return $array;
    
    $n_split = floor(count($array) / 2);
    $left = merge_sort(array_slice($array, 0, $n_split));
    $right = merge_sort(array_slice($array, $n_split));

    $r = merge($left, $right);
    return $r;
}

function merge(array $left, array $right)
{
    $res=[];
    while( count($left)>0 || count($right)>0 ) {
        if(empty($right)) {
              $res[] = array_shift($left);
        } elseif(empty($left)) {
              $res[] = array_shift($right);
        } else if(array_slice($left,0,1)<array_slice($right,0,1)) {
            $res[] = array_shift($left);
        } else {
            $res[] = array_shift($right);
        }
    }
    
    return $res;
}
