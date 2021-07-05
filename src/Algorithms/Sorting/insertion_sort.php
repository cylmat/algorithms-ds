<?php
/**
 * Insertion sort
 *  - Works the way we sort playing cards in our hands.
 * 
 * ref: https://www.geeksforgeeks.org/insertion-sort
 */

/**
 * Iterative
 */
function triInsertionIter($a)
{
    //save key the second
    //  foreach 1..key-1 
    for ($i=1; $i<count($a); $i++) { //echo "i $i:{$a[$i]}\n";
        $key=$a[$i];
        //if key < previous push previous forward
        for ($j=$i; $j>0 && $a[$j-1]>$key; $j--) { // echo "j $j:{$a[$j]}\n";
                $a[$j]=$a[$j-1];    
        }
        $a[$j] = $key;
    }
    return $a;
}

$a = [56,12,42,8,57,93,2,16,17,49,85];
$r = triInsertionIter($a);


//res
echos(true);










/************
 Other
*/
function insertionRec(int[] t, int n, int e) {
  // n nombre d'éléments de t
  // e élément à insérer
  if ((n == 0) || (e >= t[n - 1]))
      t[n] = e;
  else {
      t[n] = t[n - 1];
      insertionRec(t, n - 1, e);
  }
}

function insertionI ( int t[], int n, int e){
  // n nombre d'éléments de t
  // e élément à insérer
  int i;
  for(i=n; ((i!=0)&&(e<t[i-1])); --i) // arrêt : ((i==0)||(e>=t[i-1]))
      t[i]=t[i-1];
  t[i]=e;
}


/////////////////////////////////////:
 triInsertionR(int t[], int n) {
  if (n > 1) {
      triInsertionR(t, n - 1);
      insertionRec(t, n - 1, t[n - 1]);
  }
}

 triInsertionI(int t[], int n){
  for(int i=1; i<n; ++i)
      triInsertionI(t, i, t[i]);
}
