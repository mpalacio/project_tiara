<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_model extends PT_Model {
    public static $table = "segments";

    public $id = 0;
    
    public $competition_id = 0;
    
    public $name = NULL;
    
    public $date = NULL;
    
    public $venue = NULL;
    
    public $status = NULL;
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function get($id = 0)
    {
        $segment = NULL;
        
        $this->db->where(array("id" => $id));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
            $segment = $this->instantiate($query->row_array());
        
        return $segment;
    }
    
    public function by_competition($competition_id = 0)
    {
        $segments = array();
        
        if($competition_id)
        {
            $this->db->where(array("competition_id" => $competition_id));
            
            $query = $this->db->get(self::$table);
            
            if($query->num_rows())
            {
                foreach($query->result_array() AS $row)
                    $segments[] = $this->instantiate($row);
            }
        }
        
        return $segments;
    }
}