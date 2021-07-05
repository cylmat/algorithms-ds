<?php

/**
* Minimum number of Coins
* What is the minimum number of coins and/or notes needed to make the change?
*
* I/O: 70 => 50 and 20
*
* 1) Sort the coins in decreasing order, Find the largest denomination
* 2) Subtract value of found denomination from amount.
*
* ref: https://www.geeksforgeeks.org/greedy-algorithm-to-find-minimum-number-of-coins/
*/
function min_number_coin(int $input, array $supply): array
{
    rsort($supply);
    $change_back = [];
    while($input > 0) {
        foreach ($supply as $coin) {  // optimisation! : remove unused coin from supply
            // get change and substract from input
            if ($coin<=$input) {
                $change_back[] = $coin;
                $input -= $coin;
            break;
            }
        }
    }
    return $change_back;
}
$input = 93;
$supply = [1, 2, 5, 10, 20, 50, 100, 500, 1000];
$res_mnc = min_number_coin($input, $supply);
$expect_mnc = [50, 20, 20, 2, 1];

//echo assert($res_mnc === $expect_mnc);
