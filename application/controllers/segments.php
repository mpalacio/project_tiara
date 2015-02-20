<?php

class Segments extends PT_Controller {
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
	$judge = json_decode($this->session->userdata("judge"));
	
	$judge = $this->competition->judge($judge->id);
	
	$this->load->view("template/header", array(
		"title" => "Sample | Index",
		"styles" => array(
			"tiara/tiara"
		),
		"nav" => $this->load->view("judges/nav", array(
			"competition" => $this->competition,
			"judge" => $judge
		    ), TRUE
		)
	    )
	);
	
	$this->load->view("segments/partial/index", array("competition" => $this->competition, "judge" => $judge));
	
	$this->load->view("template/footer");
    }
    
    public function sheet($slug = NULL)
    {
	$judge = json_decode($this->session->userdata("judge"));
	
	$judge = $this->competition->judge($judge->id);
	
	$this->load->view("template/header", array(
		"title" => "Sample | Index",
		"styles" => array(
			"tiara/tiara"
		),
		"nav" => $this->load->view("judges/nav", array(
			"competition" => $this->competition,
			"judge" => $judge
		    ), TRUE
		)
	    )
	);
	
	$segment = $judge->segment_by_slug($slug);
	
	$this->load->view("segments/partial/sheet", array("competition" => $this->competition, "segment" => $segment));
	
	$this->load->view("template/footer");
    }
}