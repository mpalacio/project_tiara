<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class PT_Controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        error_reporting(E_ERROR|E_WARNING);
    }
}
