<?php

class Segments extends PT_Controller {
    protected $competition = NULL;
    
    protected $judge = NULL;
    
    protected $segment = NULL;
    
    public function __construct()
    {
	parent::__construct();
	
	$this->load->model("admin/Competition_model", "competition_model");
	
	$slug = $this->uri->segment(1);
	
	// Object: Competition Model
	$this->competition = $this->competition_model->get_by_slug($slug);
	
	// Session: Judge
	$this->judge = json_decode($this->session->userdata("judge"));
	
	// Object: Judge Model
	$this->judge = $this->competition->judge($this->judge->id);
	
	// Is Competition Judge?
	if($this->judge == NULL)
	    show_404();
    }
    
    public function index()
    {
	// Array: Judge Segment Model Object
	$judge_segments = $this->judge->segments();
	
	$this->load->view("template/header", array(
		"title" => "Sample | Index",
		"styles" => array(
			"tiara/tiara"
		),
		"nav" => $this->load->view("judges/nav", array(
			"competition" => $this->competition,
			"judge" => $this->judge
		    ), TRUE
		)
	    )
	);
	
	$this->load->view("segments/partial/index", array("competition" => $this->competition, "judge_segments" => $judge_segments));
	
	$this->load->view("template/footer", array(
		"scripts" => array(
		    "tiara/judges"
		)
	    )
	);
    }
    
    public function sheet($slug = NULL)
    {
	// Object: Segment Model
	$this->segment = $this->competition->segment_by_slug($slug);
	
	// Is Segment a Competition Segment?
	if($this->segment == NULL)
	    show_404();
	
	// Object: Segment Judge Model
	$segment_judge = $this->segment->judge($this->judge->id);
	
	// Is Judge a Segment Judge?
	if($segment_judge == NULL)
	    show_404();
	
	$this->load->view("template/header", array(
		"title" => "Sample | Index",
		"styles" => array(
			"tiara/tiara"
		),
		"nav" => $this->load->view("judges/nav", array(
			"competition" => $this->competition,
			"judge" => $this->judge
		    ), TRUE
		)
	    )
	);
    
	$this->load->view("segments/partial/sheet", array("competition" => $this->competition, "segment" => $this->segment, "segment_judge" => $segment_judge));
	
	$this->load->view("template/footer", array(
		"scripts" => array(
		    "jquery/input-mask/jquery.inputmask.min",
		    "jquery/input-mask/jquery.inputmask.numeric.extensions.min",
		    "tiara/judges"
		)
	    )
	);
    }
}