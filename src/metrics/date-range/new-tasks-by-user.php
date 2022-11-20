<?php
    $newTasksByUser = array();

    foreach($newTasks as $t) {
        if (!$t->assignee) { // For new tasks, go by assignee since there's no created_by prop. There is created_by in the custom_fields array, but I think that refers to who create the custom field.
            echo '<pre>'; print_r($t); echo '</pre>';

            $key = md5("Unassigned");
            if (!array_key_exists($key, $newTasksByUser)) {
                $newTasksByUser[$key] = array('name' => 'Unassigned', "value" => 1);
            } else {
                $newTasksByUser[$key]["value"]++;
            }
        } else {
            $key = md5($t->assignee->name);
            if (!array_key_exists($key, $newTasksByUser)) {
                $newTasksByUser[$key] = array('name' => $t->assignee->name, "value" => 1);
            } else {
                $newTasksByUser[$key]["value"]++;
            }
        }
    }

    $newTasksByUserPayload = array();
    foreach($newTasksByUser as $t) {
        array_push($newTasksByUserPayload, ['new_tasks_by_user', $t["value"], $now, ["user" => $t["name"]]]);
    }

    $databoxClient->insertAll($newTasksByUserPayload);
?>