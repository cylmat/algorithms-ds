<?php

/**
* Job sequencing problem
* How to maximize total profit if only one job can be scheduled at a time.
* (each job take 1 unit of time)
*
* 1) Sort && Iterate in decreasing order of profit.
* 2) Find a free time slot i with i < deadline and i is greatest, or ignore it.
*
* @see https://www.geeksforgeeks.org/job-sequencing-problem/
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

validates($res_jsp, $expect_jsp);
