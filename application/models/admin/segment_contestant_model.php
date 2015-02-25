<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_contestant_model extends PT_Model {
    public static $table = "segment_contestants";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $contestant_id = 0;
    
    public $number = 0;
    
    public function __construct()
    {
        parent::__construct();
    }
    // OK
    public function average()
    {
        $segment_contestant_scores = $this->scores();
    
        $average = $sum = 0.00;
        
        foreach($segment_contestant_scores AS $segment_contestant_score)
            $sum += $segment_contestant_score->score();
            
        $average = $sum / count($segment_contestant_scores);
        
        return $average;
    }
    // OK
    public function create($data = array())
    {
	$segment_contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_contestant);
        
        $segment_contestant->id = $this->db->insert_id();
        
        return $segment_contestant;
    }
    // OK
    public function contestant()
    {
        $contestant = NULL;
        
        if($this->contestant_id)
        {
            $this->load->model("admin/Contestant_model", "contestant_model");
            
            $contestant = $this->contestant_model->get($this->contestant_id);
        }
        
        return $contestant;
    }
    
    // OK
    public function get($id = 0, $contestant_id = 0, $segment_id = 0)
    {
        $segment_contestants = $where = array();
        
        if($id)
            $where["id"] = $id;
        
        if($contestant_id)
            $where["contestant_id"] = $contestant_id;
        
        if($segment_id)
            $where["segment_id"] = $segment_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_contestants[] = $this->instantiate($row);
        }
        
        return ($id OR ($contestant_id AND $segment_id)) ? array_shift($segment_contestants) : $segment_contestants;
    }
    // OK
    public function segment()
    {
        $segment = NULL;
	
	if($this->segment_id)
	{
	    $this->load->model("admin/Segment_model", "segment_model");
	    
	    $segment = $this->segment_model->get($this->segment_id);
	}
	
	return $segment;
    }

    // OK
    public function score($segment_judge_id = 0)
    {
        // Segment Contestant Score By Segment Judge
        $segment_contestant_score = NULL;
        
        if($this-id)
        {
            $this->load->model("admin/Segment_contestant_score_model", "segment_contestant_score_model");
            
            // Object: Segment Contestant Score
            $segment_contestant_score = $this->segment_contestant_score_model->get($this->id, $segment_judge_id);
        }
        
        return $segment_contestant_score;
    }
    
    // OK
    public function scores()
    {
        $segment_contestant_scores = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_score_model", "segment_contestant_score_model");
            
            // Array: Segment Contestant Score Object
            $segment_contestant_scores = $this->segment_contestant_score_model->get($this->id);
        }
        
        return $segment_contestant_scores;
    }
    
}