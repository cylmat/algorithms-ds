<?php
/**
 * Tri insertion
 */
$a = [56,12,42,8,57,93,2,16,17,49,85];

function triInsertionIter($a)
{
    //save key the second
    //  foreach 1..key-1 
    for ($i=1; $i<count($a); $i++) { //echo "i $i:{$a[$i]}\n";
    
        $key=$a[$i];
    //if key < previous push previous forward
        for ($j=$i; $j>0 && $a[$j-1]>$key; $j--) { // echo "j $j:{$a[$j]}\n";
                $a[$j]=$a[$j-1]; 
             //echo "{$a[$j-1]} > {$a[$j]}\n";
        //echo $j.' => '.implode('-',$a)." : \n";    
        }
        $a[$j] = $key;
        //echo implode('-',$a)."\n";
    }
    //put key at this place 
    
    return $a;
}

$r = triInsertionIter($a);
echo($r);
