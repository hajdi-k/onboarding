<?php
    $totalCompletedTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task) {
        if ($task->completed_at && ($task->completed_at < $nowLong)) { // completed before now
            array_push($totalCompletedTasks, $task);
        }
    }

    $databoxClient->push('total_completed_tasks', count($totalCompletedTasks));
?>