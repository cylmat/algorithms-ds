<?php
// The basic idea behind dynamic programming is breaking a complex problem down to several small and simpleproblems that are repeated
// Thoses who cannot remember the past are condemned to repeat it

/*
Memoization is a term describing an optimization technique where you cache previously computed results, and return the cached result when the same computation is needed again.

Dynamic programming is a technique for solving problems of recursive nature, iteratively and is applicable when the computations of the subproblems overlap.

Dynamic programming is typically implemented using tabulation, but can also be implemented using memoization. So as you can see, neither one is a "subset" of the other.

A reasonable follow-up question is: What is the difference between tabulation (the typical dynamic programming technique) and memoization?

When you solve a dynamic programming problem using tabulation you solve the problem 

                "bottom up", 

i.e., by solving all related sub-problems first, typically by filling up an n-dimensional table. Based on the results in the table, the solution to the "top" / original problem is then computed.

If you use memoization to solve the problem you do it by maintaining a map of already solved sub problems. You do it 

                "top down" 
                        
in the sense that you solve the "top" problem first (which typically recurses down to solve the sub-problems).

A good slide from here (link is now dead, slide is still good though):

        If all subproblems must be solved at least once, a bottom-up dynamic-programming algorithm usually outperforms a top-down memoized algorithm by a constant factor
            No overhead for recursion and less overhead for maintaining table
            There are some problems for which the regular pattern of table accesses in the dynamic-programming algorithm can be exploited to reduce the time or space requirements even further
        If some subproblems in the subproblem space need not be solved at all, the memoized solution has the advantage of solving only those subproblems that are definitely required

*/

//recursif
//!!!!!!!!!!!allocation momery exhausted
function fib(int $n)
{
    if($n<3) return 1;
    return fib($n-2) + fib($n-1);
}

//1-1-2-3-5-8-13-21-34-55-89-144

 //Memoization TOP->DOWN (only required values)
$memo =[1,1]; 
function fiboMem($n){
    global $memo;
    if (count($memo)>$n) {
        return $memo[$n];
    }
    $result = fiboMem($n-1)+ fiboMem($n-2)    ;
    $memo[] = $result; # f(n)= f(n-1)+ f(n-2)
    return $result;
}

//fibonacci Tabulation BOTTOM->UP (small values first)
function fibonacci($n) 
{
    $memo =[1,1]; # f(0)=1, f(1)=1
    //for i in range(2, $n+1):  
    for($i=2; $i<=$n; $i++)          
        $memo[] = $memo[$i-1]+ $memo[$i-2];
    return $memo[$n];
}


//fibonacci Tabulation BOTTOM->UP (small values first)
/**
 * alternative Memo storage [case1, case2]
 * very good idea!!!!
 */
function fibonacciOptimized($n) 
{
    $memo =[1,1]; # f(0)=1, f(1)=1
    //for i in range(2, $n+1):  
    for($i=2; $i<=$n; $i++)          
        $memo[$i%2] = $memo[0]+ $memo[1];
    return $memo[$n%2];
}