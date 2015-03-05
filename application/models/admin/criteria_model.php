<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Criteria_model extends PT_Model {
    public static $table = "criterias";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $percentage = 0.00;
    
    public $visibility = 1;
    
    public function __construct()
    {
	parent::__construct();
    }
    // OK
    public function get($id = 0, $segment_id = 0)
    {
	$segment_criterias = $where = array();
	
	if($id)
	    $where["id"] = $id;
	    
	if($segment_id)
	    $where["segment_id"] = $segment_id;
	    
	$this->db->where($where);
	
	$query = $this->db->get(self::$table);
    
	if($query->num_rows())
	{
	    foreach($query->result_array() AS $row)
		$segment_criterias[] = $this->instantiate($row);
	}
	
	return ($id) ? array_shift($segment_criterias) : $segment_criterias;
    }
    
    public function score($segment_judge_id = 0, $segment_contestant_id = 0)
    {
	$criteria_score = NULL;
	
	if($this->id)
	{
	    $this->load->model("admin/Criteria_score_model", "criteria_score_model");
	    
	    $criteria_score = $this->criteria_score_model->get(0, $this->id, $segment_judge_id, $segment_contestant_id);
	}
	
	return $criteria_score;
    }
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
    
    public function update()
    {
	$criteria = NULL;
	
	if($this->id)
	{
	    $this->db->where(array("id" => $this->id));
	    
	    $criteria = $this;
	    
	    $this->db->update(self::$table, $criteria);
	}
	
	return $criteria;
    }
}