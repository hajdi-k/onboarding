<?php
    require 'vendor/autoload.php';
    include 'partials/helpers.php';
    
    include 'config/local.php';
    // include 'config/public.php';

    $asanaClient = Asana\Client::accessToken($secrets["asana"]["personalAccessToken"]);
    $databoxClient = new Databox\Client($secrets["databox"]["asanaDataSourceToken"]);
    $now = substr(date("c"), 0, 10);
    $nowLong = str_replace('+00:00', '.000Z', gmdate('c', null));


    // Fetch Tasks
    // include ('partials/projects.php');
    // include ('partials/tasks.php');

    // Use local copy of tasks during dev
    $allTasks = json_decode(file_get_contents("test/taskscopy.json"));

    // Totals
    // include ('metrics/total/total-tasks.php'); // Done
    // include ('metrics/total/total-tasks-by-user.php'); // Done

    /* include ('metrics/total/total-completed-tasks.php');
    include ('metrics/total/total-completed-tasks-by-user.php');

    include ('metrics/total/total-overdue-tasks.php');
    include ('metrics/total/total-overdue-tasks-by-user.php'); */

    // include ('metrics/total/total-number-of-tasks-by-project.php'); // Done

    // OverTime

    // include ('metrics/date-range/new-tasks.php'); // Done
    // include ('metrics/date-range/new-tasks-by-user.php'); // Done

    // include ('metrics/date-range/completed-tasks.php');
    // include ('metrics/date-range/completed-tasks-by-user.php');

    include ('metrics/date-range/overdue-tasks.php');
    include ('metrics/date-range/overdue-tasks-by-user.php');
?>