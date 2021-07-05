<?php

$a=[7,4,9,2,8,5,1,3];

function quicksort(&$a,$l,$r,$p)
{
    $pleft=$l;
    $pright=$r-1;
    $pivalue=$a[$p];

    [$a[$p],$a[$r]] = [$a[$r],$a[$p]];
   
    while (true) {
        while ($a[$pleft]<$pivalue) {//echo " $a[$pleft] lok".PHP_EOL;
        $pleft++;
        }
        while ($a[$pright]>$pivalue && $pright>0) {//echo " $a[$pright] rok".PHP_EOL
        $pright--;
        }
       
        if($pleft>=$pright) {
            break;
        } else {
            [$a[$pright],$a[$pleft]] = [$a[$pleft],$a[$pright]];

            $pleft++;
            $pright--;
           
        }
    }

    [$a[$pleft],$a[$r]] = [$a[$r],$a[$pleft]]; //swap end
    return $pleft;
}


function qs(&$a,$l,$r)
{
    echo "AAAAA l$l r$r".PHP_EOL;
    if ($l<$r) {
        //$pivot = 0; //$a[$r];
        echo "AAAAA p:($r) -> $a[$r]".PHP_EOL;
       
        $part = partition($a,$l,$r,$r);
        echo "BBBBB part place($part)".PHP_EOL;

        qs($a,$l,$part-1);
        qs($a,$part+1,$r);
    }
}

qs($a,0,count($a)-1);
