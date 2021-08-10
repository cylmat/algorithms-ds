<?php
/**
 * Longest Common Subsequence
 * 
 * - np-complete
 * - dynamic
 * - string
 * 
 * @todo
 * 
 * ref: https://www.geeksforgeeks.org/longest-common-subsequence-dp-4/
 */

function LCSLength(string $X, string $Y, int $m, int $n): int
{
	// return if we have reached the end of either sequence
	if ($m == 0 || $n == 0)
		return 0;
    
	// if last character of X and Y matches
	if ($X[$m - 1] == $Y[$n - 1]) {
		return 1 + LCSLength($X, $Y, $m-1, $n-1);
	}

	// else if last character of X and Y don't match
	return max(LCSLength($X, $Y, $m, $n-1), LCSLength($X, $Y, $m-1, $n));
}
$x = 'RRYRYYR';
$y = 'AYAAYYA';
$res = LCSLength($x, $y, strlen($x), strlen($y));

validates($res, 3);

/*
function LCSLength(X[1..m], Y[1..n])
    C = array(0..m, 0..n)
    for i := 0..m
        C[i,0] = 0
    for j := 0..n
        C[0,j] = 0
    for i := 1..m
        for j := 1..n
            if X[i] = Y[j] //i-1 and j-1 if reading X & Y from zero
                C[i,j] := C[i-1,j-1] + 1
            else
                C[i,j] := max(C[i,j-1], C[i-1,j])
    return C[m,n]
*/

/*
function backtrack(C[0..m,0..n], X[1..m], Y[1..n], i, j)
    if i = 0 or j = 0
        return ""
    if  X[i] = Y[j]
        return backtrack(C, X, Y, i-1, j-1) + X[i]
    if C[i,j-1] > C[i-1,j]
        return backtrack(C, X, Y, i, j-1)
    return backtrack(C, X, Y, i-1, j)
*/

/*
 function printDiff(C[0..m,0..n], X[1..m], Y[1..n], i, j)
    if i > 0 and j > 0 and X[i] = Y[j]
        printDiff(C, X, Y, i-1, j-1)
        print "  " + X[i]
    else if j > 0 and (i = 0 or C[i,j-1] ≥ C[i-1,j])
        printDiff(C, X, Y, i, j-1)
        print "+ " + Y[j]
    else if i > 0 and (j = 0 or C[i,j-1] < C[i-1,j])
        printDiff(C, X, Y, i-1, j)
        print "- " + X[i]
    else
        print "" 
 */