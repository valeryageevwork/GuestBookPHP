<?php

require_once("Model/CheckDataClass.php");
require_once("Model/Message.php");
require_once("Model/UserGuest.php");
require_once("Model/SessionModel.php");
require_once("Controller/MainController.php");

header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('Europe/Moscow');

session_start();

$controller = new MainController();
$controller->show();








