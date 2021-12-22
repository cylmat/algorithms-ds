<?php

//hanoi recursive
//must be $a=[]; $c=[1,2];

$a=[1,2,3,4];
$b=[];
$c=[];

function hanoi(&$s, &$d, &$a, $n)
{
    $count=20;
   
    if($n===0) { //one element
        move_hanoi($s,$d);
        echo implode('', $s).' o-o '.implode('', $a).' o-o '.implode('', $d).PHP_EOL;
    } else {
        hanoi($s, $a, $d, $n-1);    // Step 1
        move_hanoi($s,$d);  // Step 2
        hanoi($a, $d, $s, $n-1);    //
        echo implode('', $s).' - '.implode('', $a).' - '.implode('', $d).PHP_EOL;
    }
}

function move_hanoi(&$a,&$b) //top a from top b
{
    if(!$a) return;
   
    $top_a = array_slice($a,0,1);
    $top_b = array_slice($b,0,1);
   
    if(!$top_b||$top_a<$top_b) {
        $d=array_shift($a);
        array_unshift($b,$d);
    }
}


hanoi($a,$c,$b,count($a)-1);


//hanoi iterative
$a=[
    [1,2,3,4,5,6,7,8],[],[]
];

$cnt=0; $psmall=0; $is_small=true;
while(($a[0]||$a[1]) && ++$cnt<1000) {
   
    echo ' ptr'.$psmall;
    if(!isset($a[$psmall][0])) { echo ' empty'; //current vide
        $psmall=++$psmall%3;
        continue; //invalid
    }
   
    if($is_small && $a[$psmall][0]!==1) {echo ' notone'; //not one
        $psmall=++$psmall%3;
        continue;
    }
   
    $pnext=($psmall+1)%3; echo ' next'.$pnext;
    //1
    if($is_small && $a[$psmall][0]===1) { echo ' ***ONE***';
        if(!empty($a[$pnext]) && $a[$psmall][0]>$a[$pnext][0]) { echo ' notsonext1'; //invalide
            $pnext=(++$pnext)%3;
        }
       
       
    //others
    } else { 
        if(!empty($a[$pnext]) && $a[$psmall][0]>$a[$pnext][0]) { echo ' notsonext2'; //invalide
            $pnext=(++$pnext)%3;
        }
    }
   
    //switch
    if(empty($a[$pnext]) || $a[$psmall][0]<$a[$pnext][0]) { echo ' switch'; //valid
        $g=array_shift($a[$psmall]); echo ' g'.$g;
        array_unshift($a[$pnext],$g);
       
        $is_small = !$is_small;
        $psmall = ($pnext+1)%3;
       
    } else {
        $psmall = ++$psmall%3;
    }
   
    //dump($a);
}
