<?php
    require 'vendor/autoload.php';
    
    include 'config/local.php';
    // include 'config/public.php';

    $asanaClient = Asana\Client::accessToken($secrets["asana"]["personalAccessToken"]);
    $databoxClient = new Databox\Client($secrets["databox"]["asanaDataSourceToken"]);

    include ('partials/projects.php');
    include ('partials/tasks.php');

    
    // $ok = $databoxClient->push('sales', 123000);
    // var_dump($ok);
?>