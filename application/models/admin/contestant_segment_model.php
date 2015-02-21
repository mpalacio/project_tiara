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
    /**
     * Get Contestant Segment(s)
     * 
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get($id = 0, $contestant_id = 0)
    {
        $contestant_segments = $where = array();
        
        if($id)
            $where["id"] = $id;
            
        $where["contestant_id"] = $contestant_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $contestant_segments[] = $this->instantiate($row);
        }
        
        return $contestant_segments;
    }
    /**
     * Get Segment
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
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