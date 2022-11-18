<?php
    $tasksOffset = null;
    $allTasks = array();

    // var_dump($allDataboxProductProjects[0]->gid);

    $size = 0;
    while (true) {
        $tasksPage = $asanaClient->tasks->getTasks(null, array(
            'offset' => $tasksOffset, 
            'iterator_type' => null, 
            'page_size' => 5,
            'project' => $allDataboxProductProjects[0]->gid,
            'opt_fields' => 'gid,name,assignee.name,completed,completed_at,completed_by.name,created_at,due_at'
        ));
        $allTasks = array_merge($allTasks, $tasksPage->data); // Sheesh, add some error handling, what if there's no data :(

        if (isset($tasksPage->next_page)) {
            $tasksOffset = $tasksPage->next_page->offset;
        } else {
            break;
        }

        if (++$size == 2) {
            break;
        }
    }

    echo json_encode($allTasks, JSON_PRETTY_PRINT);
?>