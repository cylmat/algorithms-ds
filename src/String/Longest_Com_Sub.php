<?php
/**
 * Longest Common Subsequence
 * 
 * - np-complete
 * - dynamic
 * - string
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
