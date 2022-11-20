<?php
    $overdueTasksByUser = array();

    foreach($overdueTasks as $t) {
        if (!$t->assignee) { // For overdue tasks, go by assignee
            $key = md5("Unassigned");
            if (!array_key_exists($key, $overdueTasksByUser)) {
                $overdueTasksByUser[$key] = array('name' => 'Unassigned', "value" => 1);
            } else {
                $overdueTasksByUser[$key]["value"]++;
            }
        } else {
            $key = md5($t->assignee->name);
            if (!array_key_exists($key, $overdueTasksByUser)) {
                $overdueTasksByUser[$key] = array('name' => $t->assignee->name, "value" => 1);
            } else {
                $overdueTasksByUser[$key]["value"]++;
            }
        }
    }

    $overdueTasksByUserPayload = array();
    foreach($overdueTasksByUser as $t) {
        array_push($overdueTasksByUserPayload, ['overdue_tasks_by_user', $t["value"], $now, ["user" => $t["name"]]]);
    }

    if (count($overdueTasksByUser) != 0) {
        $databoxClient->insertAll($overdueTasksByUserPayload);
    }
?>