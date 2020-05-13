<?php
/**
 * Permutation
 * - Print all sentences possible taking one word from a list
 * 
 * ref: http://villemin.gerard.free.fr/aNombre/MOTIF/PermutAl.htm
 *      https://www.topcoder.com/generating-permutations
 *      https://docstore.mik.ua/orelly/webprog/pcook/ch04_26.htm#phpckbk-CHP-4-EX-6
 *      https://www.geeksforgeeks.org/generate-all-the-permutation-of-a-list-in-python
 */

/**
 * Permutation par iteration
 * ref: http://villemin.gerard.free.fr/aInforma/11Recurs.htm#pemute
 *      https://www.tutorialspoint.com/all-permutations-of-a-string-using-iteration
 */
/*function permut_iter($arr, $n)  
{
   sort(str.begin(), str.end());
   while (true){
      cout << str << endl;
      int i = str.length() - 1;
      while (str[i-1] >= str[i]){
         if (--i == 0)
         return;
      }
      int j = str.length() - 1;
      while (j > i && str[j] <= str[i - 1])
      j--;
      swap(str[i - 1], str[j]);
      reverse (str.begin() + i, str.end());
   }
}
}*/

/*
* 
*/
function permutations(array $array, array $perms=[])
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

        $out .= permutations($newitems, $newperms); 
    } 
    return $out;
} 

/**
 * * https://www.techiedelight.com/combinations-phrases-formed-picking-words-lists/
 * 
 * @todo
 */


/** 
* https://stackoverflow.com/questions/2617055/how-to-generate-all-permutations-of-a-string-in-php
*/
/*
function lpermute($str,$i,$n) {
   if ($i == $n)
       print "$str\n";
   else {
        for ($j = $i; $j < $n; $j++) {
          swap($str,$i,$j);
          lpermute($str, $i+1, $n);
          swap($str,$i,$j); // backtrack.
       }
   }
}

// function to swap the char at pos $i and $j of $str.
function swap(&$str,$i,$j) {
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}

$str = "ABC";
lpermute($str,0,strlen($str)); // call the function.
*/

/**
 * https://www.geeksforgeeks.org/recursively-print-all-sentences-that-can-be-formed-from-list-of-word-lists/
 * (DFS approach)
 */
    // A recursive function to print all possible sentences that can be formed 
// from a list of word list 
/*void printUtil(string arr[R][C], int m, int n, string output[R]) 
{ 
    // Add current word to output array 
    output[m] = arr[m][n]; 
  
    // If this is last word of current output sentence, then print 
    // the output sentence 
    if (m==R-1) 
    { 
        for (int i=0; i<R; i++) 
           cout << output[i] << " "; 
        cout << endl; 
        return; 
    } 
  
    // Recur for next row 
    for (int i=0; i<C; i++) 
       if (arr[m+1][i] != "") 
          printUtil(arr, m+1, i, output); 
} 
  
// A wrapper over printUtil() 
void print(string arr[R][C]) 
{ 
   // Create an array to store sentence 
   string output[R]; 
  
   // Consider all words for first row as starting points and 
   // print all sentences 
   for (int i=0; i<C; i++) 
     if (arr[0][i] != "") 
        printUtil(arr, 0, i, output); 
} */

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
    $str = substr($str, 0, $index) . substr($str, $index+1) . $str{$index};
    if ($index==strlen($str)-2) { //reached to the end, print it
        echo "$str\n";//or keep it in an array
    }

    permute_chars($str, $index+1); //rotate its children
    permute_chars($str, $index, $count+1); //rotate itself
}
permute_chars('abc'); //rotate its children



//validate
echo (int)assert(true);