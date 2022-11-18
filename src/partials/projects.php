<?php
    $projectsOffset = null;
    $allDataboxProductProjects = array();
    while (true) {
        $projectsPage = $asanaClient->projects->getProjects(null, array(
            'offset' => $projectsOffset, 
            'iterator_type' => null,
            'page_size' => 20,
            'workspace' => $secrets["asana"]["workspaceGid"],
            'team' => $secrets["asana"]["teamId"],
            'opt_fields' => 'gid,name'
        ));
        $allDataboxProductProjects = array_merge($allDataboxProductProjects, $projectsPage->data); // Sheesh, add some error handling, what if there's no data :(

        if (isset($projectsPage->next_page)) {
            $projectsOffset = $projectsPage->next_page->offset;
        } else {
            break;
        }
    }

    // echo json_encode($allDataboxProductProjects, JSON_PRETTY_PRINT);
?>