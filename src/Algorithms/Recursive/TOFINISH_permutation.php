<?php

//https://www.geeksforgeeks.org/recursively-print-all-sentences-that-can-be-formed-from-list-of-word-lists/

/*
* https://www.techiedelight.com/combinations-phrases-formed-picking-words-lists/
*/
function permute($array, $perms=[])
{ 
    if (empty($array)) { 
        return join(' ', $perms) . "\n"; 
    }

    $out='';
    for ($i = count($array) - 1; $i >= 0; --$i) { 
        $newitems = $array; 
        $newperms = $perms; 
        $foo = array_splice($newitems, $i, 1)[0]; 
        array_unshift($newperms, $foo); //ajoute au debut
        $out.=permute($newitems, $newperms); 
    } 
    return $out;
} 


$arr = ["you", "we", "have"]; 

//echo permute($arr); 





/*
* https://stackoverflow.com/questions/2617055/how-to-generate-all-permutations-of-a-string-in-php
*/
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

$str = "hey";
lpermute($str,0,strlen($str)); // call the function.




/*
*
*/
function permute($arg) {
    $array = is_string($arg) ? str_split($arg) : $arg;
    if(1 === count($array))
        return $array;
    $result = array();
    foreach($array as $key => $item)
        foreach(permute(array_diff_key($array, array($key => $item))) as $p)
            $result[] = $item . $p;
    return $result;
}



/*
*
*/
unction permute($str,$index=0,$count=0)
{
    if($count == strlen($str)-$index)
        return;

    $str = rotate($str,$index);

    if($index==strlen($str)-2)//reached to the end, print it
    {
        echo $str."<br> ";//or keep it in an array
    }

    permute($str,$index+1);//rotate its children

    permute($str,$index,$count+1);//rotate itself
}

function rotate($str,$index)
{
    $tmp = $str[$index];
    $i=$index;
    for($i=$index+1;$i<strlen($str);$i++)
    {
        $str[$i-1] = $str[$i];
    }
    $str[$i-1] = $tmp;
    return $str;
}
permute("hey");