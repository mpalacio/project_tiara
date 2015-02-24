<?php

class Criterias extends PT_Controller {
    protected $competition = NULL;
    
    protected $judge = NULL;
    
    protected $segment = NULL;
    
    public function __construct()
    {
	parent::__construct();
	
	$slug = $this->uri->segment(1);
	
	$this->load->model("admin/Competition_model", "competition_model");
	
	$this->competition = $this->competition_model->get_by_slug($slug);
	
	// Object: Competition Model
	$this->competition = $this->competition_model->get_by_slug($slug);
	
	// Session: Judge
	$this->judge = json_decode($this->session->userdata("judge"));
	
	// Object: Judge Model
	$this->judge = $this->competition->judge($this->judge->id);
	
	// Is competition judge?
	if($this->judge == NULL)
	    show_404();
    }
    
    public function score($id = 0, $slug = NULL)
    {
	// Object: Segment Model
	$this->segment = $this->competition->segment_by_slug($slug);
	
	// Is a competition segment?
	if($this->segment == NULL)
	    show_404();
	
	// Object: Segment Judge Model
	$segment_judge = $this->segment->judge($this->judge->id);
	
	// Is Judge a Segment Judge?
	if($segment_judge == NULL)
	    show_404();
	
	$contestant = json_decode($this->input->post("contestant"));
	
	$this->load->model("admin/Criteria_score_model", "criteria_score_model");
	
	$criteria_score = $this->criteria_score_model->get(0, $id, $segment_judge->id, $contestant->id);
	
	// Update
	if($criteria_score)
	{
	    $criteria_score->score = $contestant->score;
	    $criteria_score->update();
	}
	
	// Create
	else
	{
	    $criteria_score = array(
		"criteria_id" => $id,
		"segment_judge_id" => $segment_judge->id,
		"segment_contestant_id" => $contestant->id,
		"score" => $contestant->score
	    );
	    
	    $criteria_score = $this->criteria_score_model->create($criteria_score);
	}
    }
    
    public function scores($slug = NULL)
    {
	// Object: Segment Model
	$this->segment = $this->competition->segment_by_slug($slug);
	
	// Is a competition segment?
	if($this->segment == NULL)
	    show_404();
	
	// Object: Segment Judge Model
	$segment_judge = $this->segment->judge($this->judge->id);
	
	// Is Judge a Segment Judge?
	if($segment_judge == NULL)
	    show_404();
	    
	$contestants = json_decode($this->input->post("contestants"));
	
	$this->load->model("admin/Criteria_score_model", "criteria_score_model");
	
	foreach($contestants AS $contestant)
	{
	    $criteria_score = $this->criteria_score_model->get(0, $contestant->criteria->id, $segment_judge->id, $contestant->id);
	    
	    // Update
	    if($criteria_score)
	    {
		$criteria_score->score = $contestant->score;
		$criteria_score->update();
	    }
	}
    }
}