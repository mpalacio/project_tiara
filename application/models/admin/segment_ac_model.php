<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_ac_model extends PT_Model {
    public static $table = "`segments_as_criteria`";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $alias = NULL;
    
    public $source_segment_id = 0;
    
    public $visibility = 1;
    
    public $percentage = 0.00;
    
    public function __construct()
    {
	parent::__construct();
    }
    
    public function get($id = 0, $segment_id = 0)
    {
	$composites = $where = array();
	
	if($id)
	    $where["id"] = $id;
	    
	if($segment_id)
	    $where["segment_id"] = $segment_id;
	    
	if(count($where))
	    $this->db->where($where);
	    
	$query = $this->db->get(self::$table);
	
	if($query->num_rows())
	{
	    foreach($query->result_array() AS $row)
		$composites[] = $this->instantiate($row);
	}
	
	return ($id) ? array_shift($composites) : $composites;
    }
    
    public function source()
    {
	$segment = NULL;
	
	if($this->id)
	{
	    $this->load->model("admin/Segment_model", "segment_model");
	    
	    $segment = $this->segment_model->get($this->source_segment_id);
	}
	
	return $segment;
    }
}
