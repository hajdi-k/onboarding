<?php
    $overdueTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task ) {
        if ($task->due_at && ($task->due_at < $nowLong) && !$task->completed) { // str_starts_with($task->created_at, $now)) {
            array_push($overdueTasks, $task);
        }
    }

    $databoxClient->push('overdue_tasks', count($overdueTasks));
?>