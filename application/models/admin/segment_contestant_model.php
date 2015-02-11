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
    
    public function by_segment($segment_id = 0)
    {
        $segment_contestants = array();
        
        $this->db->where(array("segment_id" => $segment_id));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_contestants[] = $this->instantiate($row);
        }
        
        return $segment_contestants;
    }
    
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
}