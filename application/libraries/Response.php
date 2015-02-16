<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Response {
    public function __construct()
    {
	
    }
    
    public function success($data = array(), $code = 200)
    {
	return json_encode(array("status" => "success", "success" => array("data" => $data, "code" => $code)));
    }
    
    public function error($message = NULL, $code = 400)
    {
	return json_encode(array("status" => "error", "error" => array("code" => $code, "message" => $message)));
    }
}