<?php
// reach

function d($i,$msg){ $GLOBALS['d'][$i] = $GLOBALS['d'][$i]??''; $GLOBALS['d'][$i] .= $msg;}

$arr = [
		[ 0, 25, 35 ],
		[ 20, 2, 15 ],
		[ 30, 10, 3 ]
	];
	
$v=[];
function se($x, $y, $v)
{
    global $arr;
    
    if($x==2&&$y==2) {
        echo implode('-',$v).' '.PHP_EOL;
        return;
    }
    
    array_push($v, $arr[$x][$y]);
    
    if($x+1<3) {se($x+1, $y, $v);}
    if($y+1<3) {se($x, $y+1, $v);}
    
    array_pop($v);
}

echo se(0,0,$v);

