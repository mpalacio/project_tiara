<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_judge_model extends PT_Model {
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
    /**
     * Title
     */
    public function by_segment($segment_id = 0)
    {
	$segment_judges = array();
	
	$this->db->where(array("segment_id" => $segment_id));
	
	$query = $this->db->get(self::$table);
	
	if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_judges[] = $this->instantiate($row);
        }
        
        return $segment_judges;
    }
    /**
     * 
     */
    public function by_judge($judge_id = 0)
    {
	$judge_segments = array();
	
	$this->db->where(array("judge_id" => $judge_id));
	
	$query = $this->db->get(self::$table);
	
	if($query->num_rows())
	{
	    foreach($query->result_array() AS $row)
		$judge_segments[] = $this->instantiate($row);
	}
	
	return $judge_segments;
    }
    /**
     * Title
     */
    public function judge()
    {
	$judge = NULL;
	
	if($this->judge_id)
	{
	    $this->load->model("admin/Judge_model", "judge_model");
	    
	    $judge = $this->judge_model->get($this->judge_id);
	}
	
	return $judge;
    }
    /**
     * Title
     */
    public function create($data = array())
    {
	$segment_judge = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_judge);
        
        $segment_judge->id = $this->db->insert_id();
        
        return $segment_judge;
    }
}