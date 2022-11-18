<?php
    $tasksOffset = null;
    $allTasks = array();

    $numOfProjectPages = 0;
    foreach ($allDataboxProductProjects as $productProject) {
        $numOfTaskPages = 0;
        while (true) {
            $tasksPage = $asanaClient->tasks->getTasks(null, array(
                'offset' => $tasksOffset, 
                'iterator_type' => null, 
                'page_size' => 10,
                'project' => $productProject->gid,
                'opt_fields' => 'gid,name,assignee.name,completed,completed_at,completed_by.name,created_at,due_at,projects.name'
            ));

            foreach ($tasksPage->data as &$data) {
                $data->currentproject = $productProject->gid;
            }

            $allTasks = array_merge($allTasks, $tasksPage->data); // Sheesh, add some error handling, what if there's no data :(
    
            if (isset($tasksPage->next_page)) {
                $tasksOffset = $tasksPage->next_page->offset;
            } else {
                break;
            }

            if (++$numOfTaskPages == 2) { // Added it so the url doesn't timeout xD 
                break;
            }
        }

        if (++$numOfProjectPages == 2) { // Added it so the url doesn't timeout xD 
            break;
        }
    }

    // echo json_encode($allTasks, JSON_PRETTY_PRINT);
?>