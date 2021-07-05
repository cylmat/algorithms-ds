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
$res_subsum = subsetsum($search, $values, count($values)); //true

/**
 * Iterative way (bottom-up)
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


/**
 * Topdown
 * 
 * - recursive
 * - binary tree
 * 
 * refs:
 *  https://iq.opengenus.org/subset-sum-problem-recursive-approach
 *  https://www.geeksforgeeks.org/subset-sum-backtracking-4
 */
function isSubsetSum(array $array, int $n, int $sum, array $sub_array=[], array &$results=[]): bool
{
    // END si plus d'éléments ou somme dépassée
    if ($n==0 || $sum<0) {return false;}
    
    // YES si somme atteinte retourne true
    if ($array[$n-1]===$sum) {
        
        array_push($results, $array[$n-1]);
        return $array[$n-1]; 
    }
    
    // inclus l'élément suivant
    $include = isSubsetSum($array, $n-1, $sum-$array[$n-1], $sub_array, $results);
    if ($include) {
        array_push($results, $array[$n-1]);
    }
    
    // exclus l'élément
    $exclude = isSubsetSum($array, $n-1, $sum, $sub_array, $results);
    return $include ?: $exclude;
}
$set = array(9, 1, 2, 12, 3, 8); 
$sum = 11;
$results = [];
$res_is = isSubsetSum($set, count($set), $sum, $results); 

echos($res_subsum && $res_i && $res_is);
