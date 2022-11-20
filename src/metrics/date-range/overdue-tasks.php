<?php
    $overdueTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task ) {
        if ($task->due_at && str_starts_with($task->due_at, $now) && !$task->completed) { // went overdue today
            array_push($overdueTasks, $task);
        }
    }

    $databoxClient->push('overdue_tasks', count($overdueTasks));
?>