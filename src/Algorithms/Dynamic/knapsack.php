<?php
/**
 * Knapsack problem
 * - recursivity, dynamic programming
 */

$values = [60, 100, 120];
$weight = [10, 20, 40];
$capacity = 50;

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

function knapSack($capacity, $weight, $values, $n)
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

$res = knapSack($capacity, $weight, $values, count($values));
echo (int)assert($res===180);
