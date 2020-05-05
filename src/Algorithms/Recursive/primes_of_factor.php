<?php
/**
 * Find primes numbers of given factor
 * 
 * - divide by current-1 until 2
 * - if divided, factor become current and diviser is stored
 */

function find_all_primes_divisors(int $factor, int $current=null): string
{
    if (null===$current) {
        $current=$factor-1;
    }
    
    //base case
    if ($current==1) {
        return '';
    }
    
    $out='';
    
    //test if $current can divide factor
    $div = $factor / $current;
    if (is_int($div)) {
        //echo "$current can divide $factor\n";
        if(_isprime($current)) $out.="$current ";
    }
    
    $out .= find_all_primes_divisors($factor, $current-1);
    return $out;
}

function _isprime(int $number, int $c=null): bool
{
    if(null===$c) $c=$number-1;
    if($c==1 || $number===1) return true;
    
    if(is_int($number / $c)) return false;
    
    return (__FUNCTION__)($number, $c-1);
}


/******************************
 * 
 ***********************/
// try Closure recursive
$check_prime = function (int $int, int $current=null) use (&$check_prime): bool
{
    if(null===$current) $current = $int;
    
    // check de 2 à $int
    if ($current == 1) return true;
    
    // if is divisible: not prime
    if ($int !== $current && is_int($int / $current)) {
        return false; 
    }
    
    return $check_prime($int, $current-1); 
};

/**
 * ITERATIVE
 * find all primes numbers until max
 */
function find_all_primes_until_i(int $max)
{
    $out='';
    for ($f=2; $f<$max; $f++) {
        $isprime = true;
        for ($test=2; $test<$max; $test++) {
            if ($test!=$f && is_int($f/$test)) {
                $isprime=false;
            } 
        }
        if ($isprime) {
            $out .= "$f ";
        }
    }
    return $out;
}

$res_div = find_all_primes_divisors(102) === "17 3 2 ";
//echo $res;
 
$res_max = find_all_primes_until_i(10) === "2 3 5 7 ";
//echo $res;

echo (int)assert($res_div && $res_max); 