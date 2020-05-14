<?php
/**
 * Subset Sum
 * - Determine if there is a subset of the given set with sum equal to given sum.
 * 
 * Input: [2, 5, 3], sum: 10 - Output: true
 * Input: [4, 7],    sum: 10 - Output: false
 * 
 * - Bitmasking
 * 
 * refs:
 * 	https://www.geeksforgeeks.org/subset-sum-problem-dp-25
 * 	https://www.techiedelight.com/subset-sum-problem
 */

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

/**
 * Search if a value (ex: 10) exists in subset of array
 * 
 * @return find or not
 */
$memoization=[];
function subsetsum(int $search, array $values, int $n): bool
{
    d("- n:".($n)." s:".$search);
    if(0==$n && $search!=0) {d("false");return false;} //not found until last element
    if(0==$search) {d("true");return true;} //finded 

	//if($memoization) {
	//select if current element can be included or not
    $with = subsetsum($search, $values, $n-1);
	$out  = subsetsum($search-$values[$n-1], $values, $n-1);
	//}

	$res = $out || $with;
	$memoization = $res;
    return $res;
}
$search = 10;
$values = [8, 4, 6, 3];
$res = subsetsum($search, $values, count($values));


/**
 * Iterative way
 * 
 * ref: https://www.geeksforgeeks.org/subset-sum-problem-dp-25
 */
/*
        |0   |1   |2   |3   |4   |5   |6   |7   |8   |9   |10  |
    0   |1   |    |    |    |    |    |    |    |    |    |    |
    1   |1   |    |    |    |    |    |    |    |1   |    |    |
    2   |1   |    |    |    |1   |    |    |    |1   |    |    |
    3   |1   |    |    |    |1   |    |1   |    |1   |    |1   |
    4   |1   |    |    |1   |1   |    |1   |1   |1   |1   |1   |
 */
function subsetsum_i(int $sum, array $arr, int $n): bool
{
	$T=[]; 
	
	//init Tab values
	for ($i = 0; $i <= $n; $i++) {
		$T[$i][0] = true; //every (0) of each row
	}
	for ($j = 1; $j <= $sum; $j++) {
		$T[0][$j] = false; //each col from 1st row
	}

    //for each row value in array
	for ($i = 1; $i <= $n; $i++) { 
	    //fill each col until value-1
		for ($j = 1; $j <= $sum; $j++) {
		    // find subset with sum j by excluding or including the ith item
			if ($arr[$i-1] > $j) { //if value if more than j
                $T[$i][$j] = $T[$i-1][$j]; //copy value from prev row
			} else { 
			    //
			    $diff_value = $j-$arr[$i-1]; //copy (col_num - previous_value)
                $T[$i][$j] = $T[$i-1][$j] || $T[$i-1][$diff_value];
			}
		}
	}
	//display_2d_matrix($T);
	return $T[$n][$sum]; //(4)(10)
}
$sum = 10;
$arr = [8, 4, 6, 3];
$res_i = subsetsum_i($sum, $arr, count($arr));

/*  
 * cherche si il existe des éléments 
 dont la somme est égale à $sum
RECURSIF arbre binaire enlève la somme au fur et a mesure
*/
$sub=[];
function isSubsetSum($array, $i, $sub_array, $sum)
{
    global $sub;
    // END si plus d'éléments ou somme dépassée
    if($i<0) {d('tI ');return false;}
    if($sum<0) {d('tS '.$sum);return false;}
 
    // YES si somme atteinte retourne true
    if($array[$i]===$sum) {
        {d(' YES'.$i.':'.$array[$i].'! ');array_push($sub,$array[$i]);return $array[$i];} 
    }
    
    // inclus l'élément suivant
    $include = isSubsetSum($array, $i-1, $sub_array, $sum-$array[$i]);
    if($include) {d(' .Inc'.($i).'. '); array_push($sub,$array[$i]);}
    
    // exclus l'élément
    $exclude = isSubsetSum($array, $i-1, $sub_array, $sum);
    if($exclude) {d(' .Exc'.($i).'. ');}
    
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

for($i=2; $i<15; $i++) {
    //echo $i;
    $r=subset_sum($list, 0, $i);
}


$values = [8, 4, 6, 3];
$values_f = [8, 4, 5, 3]; //false
$search = 10;

//topdown
$res = subsetsum($search, $values, count($values));
$res_f = !subsetsum($search, $values_f, count($values_f));

//iter
$ires = subsetsum($search, $values, count($values));

echo (int)assert($res && $res_f && $ires);