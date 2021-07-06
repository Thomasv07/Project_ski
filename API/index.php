<?php
require_once __DIR__ . '/vendor/altorouter/altorouter/AltoRouter.php';
require_once __DIR__ . '/vendor/autoload.php';


$router = new AltoRouter();
// setBasePath specifies a base URL 
$router->setBasePath('Project_ski/API/');

//Map a route to a target
$router->map('GET', '/', 'ControllerParticipant#getAll#ControllerParticipant#getCat', 'homepage');
$router->map('GET', '/select', 'ControllerCategory#selectcategory');
$router->map('POST', '/insert', 'ControllerParticipant#insertParticipant#ControllerTournament#insertTournament#ControllerParticipant#exportExcel');
$router->map('POST', '/import', 'ControllerTrial#insertExcel');
// match will do strict type checks on a pattern
$match = $router->match();

if ($match) {
    $count = count(explode('#', $match['target']));

    if ($count == 6) {
        list($controller, $action, $controller2, $action2, $controller3, $action3) = explode('#', $match['target']);
        $obj = new $controller();
        $obj2 = new $controller2();
        $obj3 = new $controller3();
        callControl($obj, $action, $match);
        callControl($obj2, $action2, $match);
        callControl($obj3, $action3, $match);
    } elseif ($count == 4) {
        list($controller, $action, $controller2, $action2) = explode('#', $match['target']);
        $obj = new $controller();
        $obj2 = new $controller2();
        callControl($obj, $action, $match);
        callControl($obj2, $action2, $match);
    } else {
        list($controller, $action) = explode('#', $match['target']);
        $obj = new $controller();
        callControl($obj, $action, $match);
    }
}

function callControl($obj, $action, $match)
{
    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), array($match['params']));
    }
}