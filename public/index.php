<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET["seed"]) && $_GET["seed"] == true) {
    require_once("../database/ApiFutebolSeeder.class.php");
    $result = (new ApiFutebolSeeder)->seed();
    echo "<pre>";
    var_dump($result);
    echo "<pre />";
    die();
}

if (isset($_GET["migrate"]) && $_GET["migrate"] == true) {
    require_once("../database/ApiFutebolMigrate.class.php");
    $result = (new ApiFutebolMigrate)->migrate();
    echo "<pre>";
    var_dump($result);
    echo "<pre />";
    die();
}

use app\core\Router;

require_once("../config/config.php");
require_once("../app/autoload.php");
require_once("../app/helpers/Helper.class.php");
require_once("../app/core/Router.class.php");
require_once("../config/App.php");

(new Router);
$read = new Read;