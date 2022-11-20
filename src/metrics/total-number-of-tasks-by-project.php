<?php
    $totalTasksByProject = array();

    foreach($allTasks as $t) {
        // All tasks will have a project, sicne I'm getting them per project.
        $getProjectNameFromArray = findObjectByGid($t->projects, $t->currentproject)->name;
        $key = md5($t->currentproject);
        if (!array_key_exists($key, $totalTasksByProject)) {
            $totalTasksByProject[$key] = array('project-name' => $getProjectNameFromArray, "value" => 1);
        } else {
            $totalTasksByProject[$key]["value"]++;
        }
    }

    $totalTasksByProjectPayload = array();
    foreach($totalTasksByProject as $t) {
        array_push($totalTasksByProjectPayload, ['total_number_of_tasks_by_project', $t["value"], date("c"), ["project" => $t["project-name"]]]);
    }

    $databoxClient->insertAll($totalTasksByProjectPayload);
?>