<?php
    $completedTasksByUser = array();

    foreach($completedTasks as $t) {
        if (!$t->completed_by) { // For completed tasks, don't go by assignee. There is a completed_by prop 
            $key = md5("Unassigned");
            if (!array_key_exists($key, $completedTasksByUser)) {
                $completedTasksByUser[$key] = array('name' => 'Unassigned', "value" => 1);
            } else {
                $completedTasksByUser[$key]["value"]++;
            }
        } else {
            $key = md5($t->completed_by->name);
            if (!array_key_exists($key, $completedTasksByUser)) {
                $completedTasksByUser[$key] = array('name' => $t->completed_by->name, "value" => 1);
            } else {
                $completedTasksByUser[$key]["value"]++;
            }
        }
    }

    $completedTasksByUserPayload = array();
    foreach($completedTasksByUser as $t) {
        array_push($completedTasksByUserPayload, ['completed_tasks_by_user', $t["value"], $now, ["user" => $t["name"]]]);
    }

    $databoxClient->insertAll($completedTasksByUserPayload);
?>