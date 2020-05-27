<?php
/**
 * Input: void
 * Output: float approximation of PI
 *
 * square of 1,1
 * generate array of 30000 x,y inside 1,1
 * compare percentage of inside and outside circle
 * inside circle is PI/4
 *
 * - ref: https://fr.wikipedia.org/wiki/Approximation_de_%CF%80
 */

function approx_pi_i(): float
{
    $x=rand(0,100)/100;
    $y=rand(0,100)/100;
    echo ($x.'-'.$y).PHP_EOL;
    $r = sqrt(($x**2)+($y**2)); //V(x2+y2)
    echo $r.PHP_EOL;
    
    $num = 100000;
    $inside = 0;
    
    $precis = 100000;
    //generate array
    for ($i=0; $i<$num; $i++) {
        $point = [rand(0,$precis)/$precis,rand(0,$precis)/$precis];
        $r = sqrt(($point[0]**2)+($point[1]**2)); //V(x2+y2)

        if ($r <= 1) {
            $inside++;
        }
    }
    
    return (4*$inside/$num);
}

$res = approx_pi_i();
echo (int)assert($res>3 && $res<3,5);
