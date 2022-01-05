<?php

//hanoi recursive
//must be $a=[]; $c=[1,2];

function hanoi(array &$s, array &$d, array &$a, int $n) {
    $count=20;
   
    if ($n===0) { //one element
        _hanoi_move($s,$d);
    } else {
        hanoi($s, $a, $d, $n-1);    // Step 1
        _hanoi_move($s,$d);  // Step 2
        hanoi($a, $d, $s, $n-1); 
    }
}

function _hanoi_move(&$a,&$b) //top a from top b
{
    if (!$a) return;
   
    $top_a = array_slice($a,0,1);
    $top_b = array_slice($b,0,1);
   
    if (!$top_b||$top_a<$top_b) {
        $d=array_shift($a);
        array_unshift($b,$d);
    }
}

$a=[1,2,3,4];
$b=[];
$c=[];
hanoi($a,$c,$b, count($a)-1);
validates($c, [1,2,3,4]);



//hanoi iterative
function hanoi_iter(array &$a): void {
    
    $cnt=0; $psmall=0; $is_small=true;
    while(($a[0]||$a[1]) && ++$cnt<1000) {
       
        if(!isset($a[$psmall][0])) { //current vide
            $psmall=++$psmall%3;
            continue; //invalid
        }
       
        if($is_small && $a[$psmall][0]!==1) { //not one
            $psmall=++$psmall%3;
            continue;
        }
       
        $pnext=($psmall+1)%3;
        //1
        if($is_small && $a[$psmall][0]===1) { 
            if(!empty($a[$pnext]) && $a[$psmall][0]>$a[$pnext][0]) { //invalide
                $pnext=(++$pnext)%3;
            }
           
        //others
        } else { 
            if(!empty($a[$pnext]) && $a[$psmall][0]>$a[$pnext][0]) {//invalide
                $pnext=(++$pnext)%3;
            }
        }
       
        //switch
        if(empty($a[$pnext]) || $a[$psmall][0]<$a[$pnext][0]) {  //valid
            $g=array_shift($a[$psmall]); 
            array_unshift($a[$pnext],$g);
           
            $is_small = !$is_small;
            $psmall = ($pnext+1)%3;
           
        } else {
            $psmall = ++$psmall%3;
        }
    }
}
$a=[
    [1,2,3,4,5,6,7,8],[],[]
];
hanoi_iter($a);
validates($a[2], [1,2,3,4,5,6,7,8]);
