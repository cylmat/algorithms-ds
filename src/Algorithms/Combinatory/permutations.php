<?php
/**
 * Permutation
 * - Print all sentences possible taking one word from a list
 * 
 * refs: 
 *  https://www.topcoder.com/generating-permutations
 *  https://www.geeksforgeeks.org/generate-all-the-permutation-of-a-list-in-python
 */

/*
 * Input: [a,b,c]
 * Output: abc, bac, acb, cab, bca, cba
 * 
 * ref: https://docstore.mik.ua/orelly/webprog/pcook/ch04_26.htm#phpckbk-CHP-4-EX-6
 */
function print_words_permutations(array $array, array $perms=[]): string
{ 
    // Base
    if (empty($array)) { 
        return join(' ', $perms) . "\n"; 
    }

    $out='';    
    // 
    for ($i = count($array) - 1; $i >= 0; --$i) { 
        $newitems = $array; 
        $newperms = $perms; 
        $foo = array_splice($newitems, $i, 1)[0]; 
        array_unshift($newperms, $foo); //ajoute au debut

        $out .= print_words_permutations($newitems, $newperms); 
    } 
    return $out;
} 
$res = print_words_permutations(['a','b']);

validates($res, "a b\nb a\n");

/**
 * Print all combinations of -lists- of words
 * 
 * https://www.techiedelight.com/combinations-phrases-formed-picking-words-lists/
 * 
 */
function printAllCombinations(array $list, int $n, string $res, int $list_num): void
{
	// if we have traversed each list
	if ($list_num == $n) {
		// print phrase after removing trailing space
		echo substr($res,1) . "\n";
		return;
	}

	// get size of current list
	$m = count($list[$list_num]);

	// do for each word in current list
	for ($i = 0; $i < $m; $i++)
	{
		// append current word to output
		$out = $res . " " . $list[$list_num][$i];

		// recur for next list
		printAllCombinations($list, $n, $out, $list_num + 1);
	}
}
$list = [
	[ "alpha", "beta" ], [ "zoo", "yield" ], [ "000", "111" ]
];

ob_start();
printAllCombinations($list, count($list), "", 0);
$res = trim(ob_get());

validates($res, "alpha zoo 000
alpha zoo 111
alpha yield 000
alpha yield 111
beta zoo 000
beta zoo 111
beta yield 000
beta yield 111");

/** 
 * Backtracking approach
 * 
 * ref: https://stackoverflow.com/questions/2617055/how-to-generate-all-permutations-of-a-string-in-php
 */
function backtrack_string_permute(string $str, $i, $n): void
{
   if ($i == $n) {
       echo "$str\n";
   } else {
        for ($j = $i; $j < $n; $j++) {
          //swap ($i) and ($j);
          [$str[$i], $str[$j]] = [$str[$j], $str[$i]];

          backtrack_string_permute($str, $i+1, $n);
          [$str[$i], $str[$j]] = [$str[$j], $str[$i]]; // backtrack.
       }
   }
}

$str = "ABC";
ob_start();
backtrack_string_permute($str, 0, strlen($str)); // call the function.
$res = ob_get();

validates($res, "ABC
ACB
BAC
BCA
CBA
CAB");

/*
 * Permutation of array
 *  Input: ['a','b','c']
 *  Output:  [a,b,c], [a,c,b], [b,a,c] ...
 */
function permute_array(array $array): array 
{
    if(1 === count($array)) {
        return $array;
    }
        
    $result = array();
    foreach($array as $key => $item) {
        foreach (permute_array(array_diff_key($array, array($key => $item))) as $p) {
            $result[] = $item . $p;
        }
    }
    return $result;
}
$res_a = permute_array(['a','b','c']);

validates($res_a, ['abc','acb','bac','bca','cab','cba']);

/*
* Print all rotations of input string recursively
* - abc -> abc, acb, cab, cba, bca, bac (in the opposite way)
*/
function permute_chars(string $str, int $index=0, int $count=0): void
{
    if($count == strlen($str)-$index) {
        return;
    }

    //transfert $index at the end of string 
    //al(p)ha -> alha(p)
    $str = substr($str, 0, $index) . substr($str, $index+1) . $str[$index];
    if ($index==strlen($str)-2) { //reached to the end, print it
        echo "$str\n";//or keep it in an array
    }

    permute_chars($str, $index+1); //rotate its children
    permute_chars($str, $index, $count+1); //rotate itself
}

ob_start();
permute_chars('abc'); //rotate its children
$res = ob_get();

validates($res, "bac
bca
cba
cab
acb
abc");

/**
 * Permutation iterative way
 *  - Sort array and switch by values
 * 
 * Input : [1,2,3]
 * Output: 123, 132, 213, 231, 312, 321
 * 
 * refs: 
 *  http://villemin.gerard.free.fr/aInforma/11Recurs.htm#pemute
 *  https://www.tutorialspoint.com/all-permutations-of-a-string-using-iteration
 */
function permut_iter(array $arr): void  
{
   sort($arr); //sort by value

   while (true) {
      echo implode(' ',$arr).PHP_EOL;

      $i = sizeof($arr)-1;
      //end when all keys are inverteds
      while ($arr[$i-1] >= $arr[$i]) {
         if (--$i == 0)
            return;
      }

      $j = sizeof($arr)-1;
      //while previous value is bigger then (j)
      while ($i < $j && $arr[$i-1] >= $arr[$j]) {
         $j--;
      }

      //switch previous and (j)
      [$arr[$i-1], $arr[$j]] = [$arr[$j], $arr[$i-1]];
      $arr = array_merge(array_slice($arr, 0, $i), array_reverse(array_slice($arr, $i)));
   }
}

ob_start();
permut_iter([2,1,3]);
$res = ob_get();

validates($res, "1 2 3
1 3 2
2 1 3
2 3 1
3 1 2
3 2 1");
