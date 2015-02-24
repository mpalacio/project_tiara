<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Criteria_score_model extends PT_Model {
    public static $table = "criteria_scores";
    
    public $id = 0;
    
    public $criteria_id = 0;
    
    public $segment_judge_id = 0;
    
    public $segment_contestant_id = 0;
    
    public $score = 0.00;
    
    public function __construct()
    {
	parent::__construct();
    }
    
    public function create($data = array())
    {
	$criteria_score = $this->instantiate($data);
	
	$this->db->insert(self::$table, $criteria_score);
	
	$criteria_score->id = $this->db->insert_id();
	
	return $criteria_score;
    }
    
    public function get($id, $criteria_id = 0, $segment_judge_id = 0, $segment_contestant_id = 0)
    {
	$criteria_scores = $where = array();
	
	if($id)
	    $where["id"] = $id;
	
	if($criteria_id)
	    $where["criteria_id"] = $criteria_id;
	
	if($segment_judge_id)
	    $where["segment_judge_id"] = $segment_judge_id;
	    
	if($segment_contestant_id)
	    $where["segment_contestant_id"] = $segment_contestant_id;
	    
	$this->db->where($where);
	
	$query = $this->db->get(self::$table);
	
	if($query->num_rows())
	{
	    foreach($query->result_array() AS $row)
		$criteria_scores[] = $this->instantiate($row);
	}
	
	return ($id OR ($criteria_id AND $segment_judge_id AND $segment_contestant_id)) ? array_shift($criteria_scores) : $criteria_scores;
    }
    public function update()
    {
	$criteria_score = NULL;
	
	if($this->id)
	{
	    $this->db->where(array("id" => $this->id));
	    
	    $criteria_score = $this;
	    
	    $this->db->update(self::$table, $criteria_score);
	}
	
	return $criteria_score;
    }
}