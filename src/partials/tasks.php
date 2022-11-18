<?php
    $tasksOffset = null;
    $allTasks = array();

    // $allDataboxProductProjects

    $size = 0;
    while (true) {
        $projectsPage = $asanaClient->tasks->getTasks(null, array('offset' => $tasksOffset, 'iterator_type' => null, 'page_size' => 5, 'workspace' => $secrets["asana"]["workspaceGid"], 'team' => $secrets["asana"]["teamId"]));
        $allTasks = array_merge($allTasks, $projectsPage->data); // Sheesh, add some error handling, what if there's no data :(

        if (isset($projectsPage->next_page)) {
            $tasksOffset = $projectsPage->next_page->offset;
        } else {
            break;
        }

        if (++$size == 2) {
            break;
        }
    }

    echo json_encode($allTasks, JSON_PRETTY_PRINT);
?>