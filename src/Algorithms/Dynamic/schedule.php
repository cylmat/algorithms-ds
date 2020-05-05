<?php

/*
 * max schedule
 */

$a=[
    [0, 6, 60],
    [1, 4, 30],
    [3, 5, 10],
    [5, 9, 50],
    [5, 7, 30],
    [7, 8, 10]
];

usort($a, function($a,$b){ return $a[0]>$b[0]; });

$m=[];
$count=[0,0,0,0,0,0];

$j=0;
/*while($j<6) {
    for($i=$j;$i<6;$i++) {
        if(!isset($m[$j])) { 
            $m[$j][] = $a[$i];  //print '='.$m[$i][array_key_last($m[$i])][1];
            $count[$j] += $a[$i][2];
        }
        elseif( $m[$j][array_key_last($m[$j])][1] <= $a[$i][0] ) { //print ' l'.$i; PHP7.3
            $m[$j][] = $a[$i];
            $count[$j] += $a[$i][2];
        }
    }
    $j++;
}*/
//print_r($m);
print_r($m[array_search(max($count),$count)]);
