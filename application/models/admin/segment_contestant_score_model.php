<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_contestant_score_model extends PT_Model {
    public $segment_contestant_id = 0;
    
    public $segment_judge_id = 0;
    
    public function __construct()
    {
	parent::__construct();
    }
    // OK
    public function get($segment_contestant_id = 0, $segment_judge_id = 0)
    {
	if($segment_judge_id)
	{
	    // Object: Segment Contestant Score
	    $segment_contestant_score = $this->instantiate(array("segment_contestant_id" => $segment_contestant_id, "segment_judge_id" => $segment_judge_id));

	    return $segment_contestant_score;
	}
	else
	{
	    $segment_contestant_scores = array();
	    
	    // Object: Segment Judge
	    $segment_contestant = $this->segment_contestant_model->get($segment_contestant_id);
	    
	    // Object: Segment
	    $segment = $segment_contestant->segment();
	    
	    foreach($segment->judges() AS $segment_judge)
	    {
		// Object: Segment Judge Score
		$segment_contestant_score = $this->instantiate(array("segment_contestant_id" => $segment_contestant_id, "segment_judge_id" => $segment_judge->id));
	    
		$segment_contestant_scores[] = $segment_contestant_score;
	    }
	    
	    return $segment_contestant_scores;
	}
    }
    
    // OK
    public function sum()
    {
	$sum = 0.00;
	
	$this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
	
	// Object: Segment Constestant
	$segment_contestant = $this->segment_contestant_model->get($this->segment_contestant_id);
    
	// Object: Segment
	$segment = $segment_contestant->segment();
	
	foreach($segment->criterias() AS $criteria)
	{
	    // Object: Criteria Score
	    $criteria_score = $criteria->score($this->segment_judge_id, $this->segment_contestant_id);
	
	    $sum += $criteria_score->score;
	}
	
	return $sum;
    }
}