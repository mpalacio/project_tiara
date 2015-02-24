<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Judge_segment_model extends PT_Model {
    public static $table = "segment_judges";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $judge_id = 0;
    /**
     * Class Constructor
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function __construct()
    {
	parent::__construct();
    }
    // OK
    public function get($id = 0, $segment_id = 0, $judge_id = 0)
    {
        $judge_segments = $where = array();
        
	if($id)
	    $where["id"] = $id;
	
        if($segment_id)
            $where["segment_id"] = $segment_id;
        
	if($judge_id)
	    $where["judge_id"] = $judge_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $judge_segments[] = $this->instantiate($row);
        }
        
        return ($id OR ($segment_id AND $judge_id)) ? array_shift($judge_segments) : $judge_segments;
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
}