<?php

use App\Router;

require_once '../vendor/autoload.php';
require '../Router.php';

try {
    Router::route();
} catch (ReflectionException $e) {

}
session_start();

R::setup('mysql:host=localhost;dbname=time-tracking', 'dev','dev');