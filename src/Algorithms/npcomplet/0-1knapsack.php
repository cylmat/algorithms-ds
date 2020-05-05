<?php
/**
 * Knapsack problem
 * Given weights and values of n items, put these items in a knapsack of capacity W to get the maximum total value in the knapsack
 * 
 * ref: https://www.geeksforgeeks.org/0-1-knapsack-problem-dp-10/
 * 
 * - optimisation combinatoire
 */

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

/**
 * Recursive (top down)
 */
function knapSack(int $capacity, array $weight, array $values, int $n)
{
    //base case
    if(0==$n || 0==$capacity) return 0;
    
    //if current element is more than capacity, then not included
    if ($weight[$n-1] > $capacity) {
        d("n:".($n-1)." current weight ".$weight[$n-1]." overweighted capacity of $capacity");
        return knapSack($capacity, $weight, $values, $n-1); 
    }
    
    //select if current element can be included or not
    $with    = $values[$n-1] + knapSack($capacity-$weight[$n-1], $weight, $values, $n-1);
    $without = knapSack($capacity, $weight, $values, $n-1);
    
    $max = max($with, $without); 
    d("n:".($n-1)." w:".$weight[$n-1]." v:".$values[$n-1]." c:$capacity with:$with out:$without max:$max");
    
    return $max;
}

/**
 * bottom up (iterative)
 */
function knapSack_i(int $W, array $wt, array $val, int $n) 
{ 
    $K = array(array()); 
    for ($i = 0; $i <= $n; $i++) 
    { 
        for ($w = 0; $w <= $W; $w++) 
        { 
            if ($i == 0 || $w == 0) 
                $K[$i][$w] = 0; 
            else if ($wt[$i - 1] <= $w) 
                    $K[$i][$w] = max($val[$i - 1] +  
                                     $K[$i - 1][$w -  
                                     $wt[$i - 1]],  
                                     $K[$i - 1][$w]); 
            else
                    $K[$i][$w] = $K[$i - 1][$w]; 
        } 
    } 
      
    return $K[$n][$W]; 
} 
/*
   |0  |1  |2  |3  |4  |5  |6  |7  |8  |9  |10 |11 |12 |13 |14 |15 |16 |17 |18 |19 |20 |21 |22 |23 |24 |25 |26 |27 |28 |29 |30 |
0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |
1  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |
2  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |100|100|100|100|100|100|100|100|100|100|160|
3  |0  |0  |0  |0  |0  |0  |0  |0  |0  |0  |60 |60 |60 |60 |60 |60 |60 |60 |60 |60 |100|100|100|100|100|100|100|100|100|100|160|
*/

$values = [60, 100, 120];
$weight = [10, 20, 40];
$capacity = 50;

$res = knapSack($capacity, $weight, $values, count($values));
echo (int)assert($res===180);
