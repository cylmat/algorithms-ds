<?php

// cherche si il existe des éléments 
// dont la somme est égale à $sum
//RECURSIF arbre binaire
//enlève la somme au fur et a mesure
function p($v){print_r($v);}
$sub=[];
function isSubsetSum($array, $i, $sub_array, $sum)
{
    global $sub;
    // END si plus d'éléments ou somme dépassée
    if($i<0) {p('tI ');return false;}
    if($sum<0) {p('tS '.$sum);return false;}
 
    // YES si somme atteinte retourne true
    if($array[$i]===$sum) {
        {p(' YES'.$i.':'.$array[$i].'! ');array_push($sub,$array[$i]);return $array[$i];} 
    }
    
    // inclus l'élément suivant
    $include = isSubsetSum($array, $i-1, $sub_array, $sum-$array[$i]);
    if($include) {p(' .Inc'.($i).'. '); array_push($sub,$array[$i]);}
    
    // exclus l'élément
    $exclude = isSubsetSum($array, $i-1, $sub_array, $sum);
    if($exclude) {p(' .Exc'.($i).'. ');}
    
    //array_push($sub_array, $exclude);
    return $include?$include:$exclude;
}
  
// Driver Code
$set = array(9, 1, 2, 12, 3, 8); //34, 4, 12, 5, 2); 

$r = isSubsetSum($set, count($set)-1, [], 10);
print_r($sub);
//print_r($r);
die();

if (isSubsetSum($set, count($set)-1, [], 12))
    echo "Found a subset with given sum"; 
else
    echo "No subset with given sum"; 
    
    
