<?php
require '../../vendor/slim/slim/Slim/Slim.php';
require '../../db.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->post('/add/', 'addCustomer');


$app->run();


function addCustomer() {
	
	try {
		$app = \Slim\Slim::getInstance();
		
		// get request body, decode into PHP object
		 
		$request = $app->request();
		
		$body = $request->getBody(); 

		$input = json_decode($body);
		
		$data = json_encode($input);

		echo $data;
		
		
		
		$message = "";
		$message_code = "";
		//$app->response()->header('Content-Type', 'application/json');

		} // end of if $input->customer_type == ""
		catch(PDOException $ex) {
		
		echo json_encode($ex->getMessage());
	}
	} 



