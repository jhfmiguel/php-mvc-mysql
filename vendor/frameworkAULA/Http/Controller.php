<?php

namespace FrameworkAULA\Http;

abstract class Controller{
	protected $request;
	protected $response;
	protected $service;
	protected $app;


	public function __loadVars($request, $response, $app){
		$this->request = $request;
		$this->response = $response;
		$this->service = new View($request, $response);
		$this->app = $app;

	}
}