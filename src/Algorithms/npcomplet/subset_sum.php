<?php
/**
 * Subset Sum
 * 
 * Determine if there is a subset of the given set with sum equal to given sum.
 * https://www.techiedelight.com
 * 
 */

if(!function_exists('d')) { function d($v){ return;var_dump($v); }}

/**
 * Recherche si une valeur (ex: 10) existe dans la somme d'un tableau 
 * ex: [2, 5, 3]=10 
 * [4, 7]!=10
 * 
 * @return trouvé ou non
 */
function subsetsum(int $search, array $values, int $n): bool
{
    d("- n:".($n)." s:".$search);
    if(0==$n && $search!=0) {d("false");return false;} //not found until last element
    if(0==$search) {d("true");return true;} //finded 

	//if($memoization) {
	//select if current element can be included or not
    d("n:".($n-1)." s:".$search." v:".$values[$n-1]."");
    $with = subsetsum($search, $values, $n-1);
	$out  = subsetsum($search-$values[$n-1], $values, $n-1);
	//}

	$res = $out || $with;
	//$memoization = $res;
    return $res;
}



/**
 * iteratif
 */
function subsetsum_i(int $sum, array $arr, int $n): bool
{
	$T=[]; 
	//$Test=[]; 

	for ($j = 1; $j <= $sum; $j++) {
		$T[0][$j] = false; 
	}

	for ($i = 0; $i <= $n; $i++) {
		$T[$i][0] = true;
	}

	for ($i = 1; $i <= $n; $i++) 
	{
		for ($j = 1; $j <= $sum; $j++)
		{
			if ($arr[$i-1] > $j) {
                $T[$i][$j] = $T[$i-1][$j];
				//$Test[$i][$j] = $arr[$i-1].">".$j." : T[".($i-1)."][$j]=".(int)$T[$i-1][$j];
			}
			else {
			// find subset with sum j by excluding or including the ith item
                $T[$i][$j] = $T[$i-1][$j-$arr[$i-1]];
                //$Test[$i][$j] = "T[".($i-1)."][$j] || T[".($i-1)."][$j-".$arr[$i-1]."]=".(int)$T[$i-1][$j-$arr[$i-1]];//$T[$i-1][$j] || $T[$i-1][$j - $arr[$i-1]];
			}
		}
	}
	return $T[$n][$sum];
}

$values = [8, 4, 6, 3];
$values_f = [8, 4, 5, 3]; //false
$search = 10;

//topdown
$res = subsetsum($search, $values, count($values));
$res_f = subsetsum($search, $values_f, count($values_f));

//iter
$ires = subsetsum($search, $values, count($values));
echo (int)assert($res && !$res_f && $ires);