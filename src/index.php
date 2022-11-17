<?php
    require 'vendor/autoload.php';
    
    include 'config/local.php';
    // include 'config/public.php';

    $asanaClient = Asana\Client::accessToken($secrets["asana"]["personalAccessToken"]);
    $databoxClient = new Databox\Client($secrets["databox"]["asanaDataSourceToken"]);

    echo 'helloooo';


    /* $offset = null;
    while (true) {
        $page = $asanaClient->projects->getProjects(null, array('offset' => $offset, 'iterator_type' => null, 'page_size' => 20, 'workspace' => $secrets["asana"]["workspaceGid"], 'team' => $secrets["asana"]["teamId"]));
        echo json_encode($page->data, JSON_PRETTY_PRINT).'\n\n';

        if (isset($page->next_page)) {
            $offset = $page->next_page->offset;
        } else {
            break;
        }
    } */
    
    // $ok = $databoxClient->push('sales', 123000);
    // var_dump($ok);
?>