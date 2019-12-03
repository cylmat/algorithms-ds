<?php

// SOURCES
//
//https://iq.opengenus.org/subset-sum-problem-recursive-approach/
//https://www.geeksforgeeks.org/subset-sum-backtracking-4/

function p($v) {return;print $v;}

function subset_sum($list, $index, $sum)
{
    p( "i=$index : sum=$sum".PHP_EOL);
    
    //BUT trouvé!!!
    if ($sum == 0) { p( 'find!'.PHP_EOL);//fin du comptage
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
      p( "r1=$inc".PHP_EOL);
      
     //We exclude current element from subset and recurse for remaining elements.
      $ex = subset_sum($list, $index + 1, $sum);
      p("r2=$ex".PHP_EOL);
     
     return $inc ? $inc : $ex;      
}


$list =  [2, 6, 11, 7, 18];
//$r=subset_sum([2, 9, 10, 1, 99, 3], 0, 4);
    //var_dump($r);
if(1)
for($i=2; $i<15; $i++) {
    echo $i;
    $r=subset_sum($list, 0, $i);
    var_dump($r);
}
