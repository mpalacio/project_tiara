<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Sample extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view("template/header", array(
                "title" => "Sample | Index",
                "styles" => array(),
                "nav" => $this->load->view("template/nav", array(), TRUE)
            )
        );
        
        
        
        $this->load->view("template/footer", array(
                "scripts" => array()
            )
        );
    }
}