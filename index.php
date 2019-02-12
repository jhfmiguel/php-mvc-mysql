<?php

require_once __DIR__.DIRECTORY_SEPARATOR."bootstrap".DIRECTORY_SEPARATOR."configuration.php";
$start = require_once __DIR__.DS."bootstrap".DS."autoload.php";

/*
$start = new FrameworkAULA\System();
$start -> run();
*/

$start -> dispatch();


?>