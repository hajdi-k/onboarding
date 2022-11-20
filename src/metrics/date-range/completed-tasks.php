<?php
    $completedTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task ) {
        if (str_starts_with($task->completed_at, $now)) {
            array_push($completedTasks, $task);
        }
    }

    $databoxClient->push('completed_tasks', count($completedTasks));
?>