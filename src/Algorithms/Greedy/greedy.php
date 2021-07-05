<?php 

include 'vendor/autoload.php';

/**
* Greedy
*  Approximately optimal solution
*
* ref: https://fr.wikipedia.org/wiki/Algorithme_glouton
* ref: https://www.geeksforgeeks.org/greedy-algorithms/
*/
/*
* - Activity Selection problem
* - Egyptian fraction
* - Job Sequencing Problem
* Job selection Problem & loss min
* Minimum product subset of an array
* Page replacement
* Huffman Coding & decoding
* Assign mice to holes
*
* DYNAMIC
*  Fractional Knapsack problem
*  Minimum number of Coins
*
* GRAPH
*  Dijkstra’s Shortest Path
*  Dial's (Optimized Dijkstra)
*  Kruskal’s Minimum Spanning Tree (MST)
*  Prim’s Minimum Spanning Tree
*  Boruvka's (Sollin1)
*
* NP-COMPLET
*  K center problem
*  Traveling Salesman Problem
*/

function d(...$v){var_dump(...$v);}
function dd(...$v){d(...$v);die();}

/**
* Activity selection problem
* Select the maximum number of activities that can be performed by a single person
*
* 1) Sort activities by finishing time
* 2) Print first, then do for the remaining activities
*
* ref: https://www.geeksforgeeks.org/activity-selection-problem-greedy-algo-1/
*/
function activity_selection_problem(array $activities)
{
    // first selected
    $do_activities = [$activities[0]];
    $last_pick = 0;
    // same for the rest
    for ($i=1; $i<count($activities); $i++) {
        // if last pick finish time <= current start time
        if ($do_activities[$last_pick][1] <= $activities[$i][0]) {
            // add activity to doing list
            $do_activities[] = $activities[$i];
            $last_pick++;
        }
    }
    return $do_activities;
}
$activities = [[1,2], [3,4], [0,6], [5,7], [8,9], [5,9]]; //start and finish time
//$res_asp = activity_selection_problem($activities);
$expect_asp = [[1,2], [3,4], [5,7], [8,9]];
//echo assert($res_asp === $expect_asp);



/**
* Egyptian fraction
* Representation of fraction using sum of 1/<integer>
*
* I/O: 12/13 is 1/2 + 1/3 + 1/12 + 1/156
*
* 1) For 6/14, find ceiling of 14/6 which is 3
* 2) Continue with 6/14 - 1/3
*
* ref: https://www.geeksforgeeks.org/greedy-algorithm-egyptian-fraction/
*/
function egyptian_fraction(int $nr, int $dr, $result=[]): array
{
    // if 0
    if ($nr==0 || $dr==0) return $result;
    // fraction of 1/n
    if ($dr % $nr == 0) {
        $result[] = (int)$dr/$nr;
        return $result;
    }
    // integer
    if ($nr % $dr == 0) {
        $result[] = (int)$nr/$dr;
        return $result;
    }
    // others cases
    if ($nr > $dr) {
        $result[] = (int)($nr/$dr);
        return egyptian_fraction($nr % $dr, $dr, $result);
    }
    // dr/nr && $dr%$nr
    $n = (int)($dr / $nr) + 1;
    $result[] = $n;
    return egyptian_fraction($nr * $n - $dr, $dr * $n, $result);
}
//$res_ef = egyptian_fraction(12, 13);
$expect_ef = [2, 3, 12, 156];
//echo assert($res_ef === $expect_ef);



/**
* Job sequencing problem
* How to maximize total profit if only one job can be scheduled at a time.
* (each job take 1 unit of time)
*
* 1) Sort && Iterate in decreasing order of profit.
* 2) Find a free time slot i with i < deadline and i is greatest, or ignore it.
*
* ref: https://www.geeksforgeeks.org/job-sequencing-problem/
*/
function job_sequencing(array $jobs): array
{
    $n = count($jobs);
    $slots = array_fill(0, count($jobs), false);
    // sort desc by Profits
    uasort($jobs, function($a,$b){ return $b[1]<=>$a[1]; }); //acdbe
    // iterate jobs
    foreach ($jobs as $j_id => $job) {
        // min with size - deadline
        $max_job_place = $job[0] - 1; 
        for ($s=$max_job_place; $s>=0; $s--) {
            // if free slot add it
            if (false === $slots[$s]) {
                $slots[$s] = $j_id;
                break;
            }
        }
    }
    return array_filter($slots, function($v){return $v;}); //remove null
}
$jobs = ['a'=>[2,100],'b'=>[1,19],'c'=>[2,27],'d'=>[1,25],'e'=>[3,15]]; // deadline, profit
$res_jsp = job_sequencing($jobs);
$expect_jsp = ['c','a','e'];
//echo assert($res_jsp === $expect_jsp);



/**
* Assign mice to holes
* Assign mice to holes so that the time when the last mouse gets inside a hole is minimized.
*
* ref: https://www.geeksforgeeks.org/assign-mice-holes/
*/
function mice_to_holes(array $mice, array $holes): int
{
    sort($mice); sort($holes);
    $max_time = 0;
    foreach ($mice as $i => $mouse) {
        //get max time to go to hole
        $time = abs($mice[$i] - $holes[$i]);
        $max_time = max($time, $max_time);
    }
    return $max_time;
}
$mice = [4, -7, 2]; 
$holes = [4, 0, 5];
$res_mth = mice_to_holes($mice, $holes);
$expect_mth = 7;
//echo assert($res_mth === $expect_mth);
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
