<?php

class Administrator extends PT_Controller {
    public function index()
    {
	$this->load->view("template/header");
	$this->load->view("template/footer");
    }
    public function login()
    {
	$this->load->view("template/header");
	
	$this->load->view("administrator/login");
	
	$this->load->view("template/footer");
    }
}