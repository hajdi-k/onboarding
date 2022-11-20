<?php
    $totalOverdueTasksByUser = array();

    foreach($totalOverdueTasks as $t) {
        if (!$t->assignee) {
            $key = md5("Unassigned");
            if (!array_key_exists($key, $totalOverdueTasksByUser)) {
                $totalOverdueTasksByUser[$key] = array('name' => 'Unassigned', "value" => 1);
            } else {
                $totalOverdueTasksByUser[$key]["value"]++;
            }
        } else {
            $key = md5($t->assignee->name);
            if (!array_key_exists($key, $totalOverdueTasksByUser)) {
                $totalOverdueTasksByUser[$key] = array('name' => $t->assignee->name, "value" => 1);
            } else {
                $totalOverdueTasksByUser[$key]["value"]++;
            }
        }
    }

    $totalOverdueTasksByUserPayload = array();
    foreach($totalOverdueTasksByUser as $t) {
        array_push($totalOverdueTasksByUserPayload, ['total_overdue_tasks_by_user', $t["value"], $now, ["user" => $t["name"]]]);
    }

    if (count($totalOverdueTasksByUser) != 0) {
        $databoxClient->insertAll($totalOverdueTasksByUserPayload);
    }
?>