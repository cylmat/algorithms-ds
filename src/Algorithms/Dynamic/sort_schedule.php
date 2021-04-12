<?php
/** 
 * Weighted Job Scheduling
 *  - Find the maximum profit subset of jobs such that no two jobs in the subset overlap. 
 * 
 * Input: [
 *  [0, 6, 60], //begin at 0, end at 6, 60 weight
 *  [1, 4, 30],
 *  [3, 5, 10], //10 weight
 *  [5, 9, 50],
 *  [5, 7, 30],
 *  [7, 8, 10]
 * ];
 * 
 * Output: [1, 4, 30], [5, 9, 50] 
 *  -> (total: 80)
 * 
 * refs:
 *  https://www.geeksforgeeks.org/weighted-job-scheduling/
 *  https://www.tutorialspoint.com/Weighted-Job-Scheduling
 *  https://riptutorial.com/dynamic-programming/example/25784/weighted-job-scheduling-algorithm
 */

if(!function_exists('d')) { function d($v){ var_dump($v); }}

/**
 * iterative
 */
function sort_schedule_i(array $jobs, int $n): array
{
    $j = 0;
    $m = []; //memoization
    $count = array_fill(0, count($jobs), 0);

    //foreach i=[0..n]
    while ($j<$n) {
        //boucle on next [i..n]
        for ($i=$j; $i<$n; $i++) {
            
            // add job on memoization
            if (!isset($m[$j])) { 
                $m[$j][] = $jobs[$i];  
                $count[$j] += $jobs[$i][2]; //add weight of job
            
            } else {
                $last_memoized = end($m[$j]);

                if( $last_memoized[1] <= $jobs[$i][0] ) { //end of job < begin of next job 
                    $m[$j][] = $jobs[$i]; // add current to memoriz
                    $count[$j] += $jobs[$i][2]; //add weight of job to count
                }
            }
        }
        $j++;
    }

    return $m[array_search(max($count),$count)];;
}

//[beginning, end, importance 'weight' of job]
$jobs=[
    [0, 6, 60], //begin at 0, end at 6, very importante
    [1, 4, 30],
    [3, 5, 10], //least importante
    [5, 9, 50],
    [5, 7, 30],
    [7, 8, 10]
];

$res = sort_schedule_i($jobs, count($jobs));
echos($res === [ [1,4,30], [5,9,50]]);
