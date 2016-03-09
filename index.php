<?php
session_start();
//use Model;
//use View;
include('Controller\BlogController.php');
include('Model\ActionHandler.php');


$mainController = new BlogController();
$actionHandler = new ActionHandler();
if(!isset($_GET['page']))
{
    $_GET['page'] = 'home';
}

if($actionHandler->actionExist($_GET['page']))
{

    $mainController->headerAction();
    $mainController->{$actionHandler->getAction($_GET['page'])}();
    $mainController->footerAction();
}
else
{
    $mainController->notFoundAction();
}
?>