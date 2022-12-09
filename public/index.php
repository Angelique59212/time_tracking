<?php
use App\Router;
use RedBeanPHP\R;

require_once '../vendor/autoload.php';
require '../Router.php';

R::setup('mysql:host=localhost;dbname=time-tracking', 'dev','dev');

session_start();

try {
    Router::route();
}
catch (ReflectionException $e) {
    echo "Une erreur est survenue";
}


