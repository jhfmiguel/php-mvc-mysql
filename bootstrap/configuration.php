<?php

define("DS", DIRECTORY_SEPARATOR);

define("RAIZ", __DIR__.DS."..");

define("APP", RAIZ.DS."app");

define("MODELS", APP.DS."Model");
define("CONTROLLERS", APP.DS."Controllers");
define("VIEWS", APP.DS."View");

define("VENDOR", RAIZ.DS."vendor");

@define("PUBLIC", RAIZ.ASSETS);

define("ASSETS", "/public_html");

@define("NAMESPACE_CONTROLLERS", Controllers);

?>