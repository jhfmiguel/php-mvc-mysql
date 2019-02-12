<?php


namespace FrameworkAULA\Routing;


use \Klein\Klein as Klein;

class Route extends Klein{

	//"App\\Controllers\\Controller@Action"

	public function get($route="*", $call=null){

		if(is_string($call)){

		$explode = explode("@", $call);
		$controller = "App\\".NAMESPACE_CONTROLLERS."\\".$explode[0]."Controller";
		$action = $explode[1];
		
		parent::get($route, function($request, $response, $service, $app) use ($controller, $action){

			$class = new $controller();
			$class -> __loadVars($request, $response, $app);
			return $class->$action();

	} );

		}else{

			parent::get("GET", $route, $call);

		}
	}


	public function post($route="*", $call=null){
		if(is_string($call)){

		$explode = explode("@", $call);
		$controller = "App\\".NAMESPACE_CONTROLLERS."\\".$explode[0]."Controller";
		$action = $explode[1];
		
		parent :: post($route, function($request, $response, $service, $app) use ($controller, $action){

			$class = new $controller();
			$class -> __loadVars($request, $response, $app);
			return $class->$action();

	} );

		}else{

			parent :: post("POST", $route, $call);

		}
	}

}

?>