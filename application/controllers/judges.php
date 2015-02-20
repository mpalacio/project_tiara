<?php

class Judges extends PT_Controller {
    public $competition = NULL;
    
    public function __construct()
    {
	parent::__construct();
	
	$this->load->model("admin/Competition_model", "competition_model");
	
	$slug = $this->uri->segment(1);
	
	$this->competition = $this->competition_model->get_by_slug($slug);
    }
    
    public function index()
    {
	
    }
}