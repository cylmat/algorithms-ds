<?php


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

$res_asp = activity_selection_problem($activities);
$expect_asp = [[1,2], [3,4], [5,7], [8,9]];

validates($res_asp, $expect_asp);
