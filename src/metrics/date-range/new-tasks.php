<?php
    $newTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task ) {
        if (str_starts_with($task->created_at, $now)) { // created today
            array_push($newTasks, $task);
        }
    }

    $databoxClient->push('new_tasks', count($newTasks));
?>