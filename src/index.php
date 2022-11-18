<?php
    require 'vendor/autoload.php';
    include 'partials/helpers.php';
    
    include 'config/local.php';
    // include 'config/public.php';

    $asanaClient = Asana\Client::accessToken($secrets["asana"]["personalAccessToken"]);
    $databoxClient = new Databox\Client($secrets["databox"]["asanaDataSourceToken"]);

    // Fetch Tasks
    include ('partials/projects.php');
    include ('partials/tasks.php');

    // Use local copy of tasks during dev
    // $allTasks = json_decode(file_get_contents("test/taskscopy.json"));

    // Totals
    include ('metrics/total-tasks.php'); // Done
    include ('metrics/total-tasks-by-user.php'); // Done

    /* include ('metrics/total-completed-tasks.php');
    include ('metrics/total-completed-tasks-by-user.php');

    include ('metrics/total-overdue-tasks.php');
    include ('metrics/total-overdue-tasks-by-user.php'); */

    include ('metrics/total-number-of-tasks-by-project.php'); // Done

    // OverTime

    // include ('metrics/new-tasks.php'); // All tasks, pass created date but now? What's new? Today? wihtout time perhaps?
    // include ('metrics/new-tasks-by-user.php'); 

    /* include ('metrics/completed-tasks.php');
    include ('metrics/completed-tasks-by-user.php');

    include ('metrics/overdue-tasks.php');
    include ('metrics/overdue-tasks-by-user.php'); */
    
    // $ok = $databoxClient->push('sales', 123000);
    // var_dump($ok);
?>