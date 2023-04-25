<?php

define('BASE', $_SERVER['DOCUMENT_ROOT']);

define('UNSET_URI_COUNT', 0);
define('DEBUG_URI', false);

define('VIEWS', BASE . '/app/views/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'futebol');
define('DB_USER', 'root');
define('DB_PASS', 'root');

require_once(BASE . "/config/App.php");

define('READ', new Read);
define('DB_UPDATE_CLASS', new Update);
define('DB_CREATE_CLASS', new Create);