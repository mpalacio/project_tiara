<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_judge_score_model extends PT_Model {
    public $segment_judge_id = 0;
    
    public $segment_contestant_id = 0;
    
    public function __construct()
    {
	parent::__construct();
    }
    
    public function get($segment_judge_id = 0, $segment_contestant_id = 0)
    {
	if($segment_contestant_id)
	{
	    // Object: Segment Judge Score
	    $segment_judge_score = $this->instantiate(array("segment_judge_id" => $segment_judge_id, "segment_contestant_id" => $segment_contestant_id));
	    
	    return $segment_judge_score;
	}
	// Get Segment Contestants
	else
	{
	    $segment_judge_scores = array();
	    
	    $this->load->model("admin/Segment_judge_model", "segment_judge_model");
	
	    // Object: Segment Judge
	    $segment_judge = $this->segment_judge_model->get($segment_judge_id);
	    
	    // Object: Segment
	    $segment = $segment_judge->segment();
	    
	    foreach($segment->contestants() AS $segment_contestant)
	    {
		// Object: Segment Judge Score
		$segment_judge_score = $this->instantiate(array("segment_judge_id" => $segment_judge_id, "segment_contestant_id" => $segment_contestant->id));
	    
		$segment_judge_scores[] = $segment_judge_score;
	    }
	    
	    return $segment_judge_scores;
	}
    }
    
    public function score()
    {
	$score = 0.00;
	
	$this->load->model("admin/Segment_judge_model", "segment_judge_model");
	
	// Object: Segment Judge
	$segment_judge = $this->segment_judge_model->get($this->segment_judge_id);
    
	// Object: Segment
	$segment = $segment_judge->segment();
	
	foreach($segment->criterias() AS $criteria)
	{
	    // Object: Criteria Score
	    $criteria_score = $criteria->score($this->segment_judge_id, $this->segment_contestant_id);
	
	    $score += $criteria_score->score;
	}
	
	return $score;
    }
}