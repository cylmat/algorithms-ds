<?php

// cherche si il existe des éléments 
// dont la somme est égale à $sum
//RECURSIF arbre binaire
//enlève la somme au fur et a mesure
//function p($v){print_r($v);}
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

/*$r = isSubsetSum($set, count($set)-1, [], 10);
print_r($sub);
//print_r($r);


if (isSubsetSum($set, count($set)-1, [], 12))
    echo "Found a subset with given sum"; 
else
    echo "No subset with given sum"; */
    
    
// SOURCES
//
//https://iq.opengenus.org/subset-sum-problem-recursive-approach/
//https://www.geeksforgeeks.org/subset-sum-backtracking-4/

function subset_sum($list, $index, $sum)
{
    //p( "i=$index : sum=$sum".PHP_EOL);
    
    //BUT trouvé!!!
    if ($sum == 0) { //p( 'find!'.PHP_EOL);//fin du comptage
        return true;
    }
        
        //Finally, we return true if we get subset by including or excluding current item else we return false
        //print count($list) . $index.PHP_EOL;
    //if ($index == count($list)) {//print $index;
    
    //LAST element
    /*if((count($list) - $index) == 1) { print "list[zero]=$list[0] : sum=$sum".PHP_EOL;
         if($list[0] === $sum) //trouvé!!!
             return true;
         else
             return false; //nop
    }*/
    if ($index > count($list)-1 || $sum < 0) {
        return false; 
    }
    
     // include current element in subset and recurse the remaining elements within remaining sum
      $sum_moins_current = $sum - $list[$index];
      $inc = subset_sum($list, $index + 1, $sum_moins_current); //enleve la sum au fur et a mesure
      //p( "r1=$inc".PHP_EOL);
      
     //We exclude current element from subset and recurse for remaining elements.
      $ex = subset_sum($list, $index + 1, $sum);
      //p("r2=$ex".PHP_EOL);
     
     return $inc ? $inc : $ex;      
}


$list =  [2, 6, 11, 7, 18];
//$r=subset_sum([2, 9, 10, 1, 99, 3], 0, 4);
    //var_dump($r);
if(1)
for($i=2; $i<15; $i++) {
    //echo $i;
    $r=subset_sum($list, 0, $i);
    //var_dump($r);
}
