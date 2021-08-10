<?php

function factorial($n, $total=1) {
    if ($n<=1) return $total;
    return factorial($n-1, $n * $total);
}

function factorial_not_tail($n) {

    if ($n<=1) return 1;
    return $n * factorial_not_tail($n-1);
}

function fibonacci_iter($n)
{
    [$prev, $curr] = [0, 1];
    foreach (range(2, $n) as $k) {
        [$prev, $curr] = [$curr, $prev + $curr];
    }
    return $curr;
}

function fibonacci_rec($n)
{
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    return fibonacci_rec($n - 1) + fibonacci_rec($n - 2);
}

function fibonacci_tail($n, $k=1, $prev=0, $curr=1)
{
    if ($k == $n) {
        return $curr;
    }
    return fibonacci_tail($n, $k + 1, $curr, $prev + $curr);
}

validates(34, fibonacci_rec(9) ); //f(9): 34
