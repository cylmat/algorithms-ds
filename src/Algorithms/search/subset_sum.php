<?php

/**
 * Subset Sum
 * 
 * Determine if there is a subset of the given set with sum equal to given sum.
 * 
 */
$values_t = [8, 4, 6, 3];
$values_f = [8, 4, 5, 3];
$search = 10;

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

/**
 * Recherche si une valeur (ex: 10) existe dans la somme d'un tableau 
 * ex: [2, 5, 3]=10 
 * [4, 7]!=10
 * 
 * @return trouvé ou non
 */
function subsetsum($search, $values, $n): bool
{
    d("- n:".($n)." s:".$search);
    if(0==$n && $search!=0) {d("false");return false;} //not found until last element
    if(0==$search) {d("true");return true;} //finded 
    
    //select if current element can be included or not
    d("n:".($n-1)." s:".$search." v:".$values[$n-1]."");
    $with = subsetsum($search, $values, $n-1);
    $out  = subsetsum($search-$values[$n-1], $values, $n-1);
    
    //$find = ($with || $without);
    $res = $out || $with;
    return $res;
}

$res = subsetsum($search, $values_t, count($values_t));
$res_f = subsetsum($search, $values_f, count($values_f));
echo (int)assert($res===true && $res_f===false);