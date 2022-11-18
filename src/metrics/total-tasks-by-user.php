<?php
    $totalTasksByUser = array();

    foreach($allTasks as $t) {
        if (!$t->assignee) {
            $key = md5("Unassigned");
            if (!array_key_exists($key, $totalTasksByUser)) {
                $totalTasksByUser[$key] = array('name' => 'Unassigned', "value" => 1);
            } else {
                $totalTasksByUser[$key]["value"]++;
            }
        } else {
            $key = md5($t->assignee->name);
            if (!array_key_exists($key, $totalTasksByUser)) {
                $totalTasksByUser[$key] = array('name' => $t->assignee->name, "value" => 1);
            } else {
                $totalTasksByUser[$key]["value"]++;
            }
        }
    }

    $totalTasksByUserPayload = array();
    foreach($totalTasksByUser as $t) {
        array_push($totalTasksByUserPayload, ['total_tasks_by_user', $t["value"], date("c"), ["user" => $t["name"]]]);
    }

    $databoxClient->insertAll($totalTasksByUserPayload);
?>