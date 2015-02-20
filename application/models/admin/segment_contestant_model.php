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
     * Get Segment Contestant(s)
     * 
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get($id = 0, $segment_id = 0)
    {
        $segment_contestants = $where = array();
        
        if($id)
            $where["id"] = $id;
            
        if($segment_id)
            $where["segment_id"] = $segment_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_contestants[] = $this->instantiate($row);
        }
        
        return $segment_contestants;
    }
    
    /**
     * Get Contestant
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
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
    /**
     * Create Segment Contestant
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function create($data = array())
    {
	$segment_contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_contestant);
        
        $segment_contestant->id = $this->db->insert_id();
        
        return $segment_contestant;
    }
}