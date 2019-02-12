<?php

require_once __DIR__.DS."..".DS."vendor".DS."autoload.php";

require_once __DIR__.DS."helpers.php";


$base  = dirname($_SERVER['PHP_SELF']);

// Update request when we have a subdirectory    
if(ltrim($base, DS)){ 

    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}


$route = new FrameworkAULA\Routing\Route();

require_once APP.DS."routes.php";

return $route;


?>