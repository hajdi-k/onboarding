<?php
    $totalOverdueTasks = array(); // Used by other files, since you're already looping all tasks here, just create the subset.

    foreach ($allTasks as $task) {
        if ($task->due_at && ($task->due_at < $nowLong) && !$task->completed) { // all overdue before now
            array_push($totalOverdueTasks, $task);
        }
    }

    $databoxClient->push('total_overdue_tasks', count($totalOverdueTasks));
?>