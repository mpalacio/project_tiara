<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competition_model extends PT_Model {
    public static $table = "competitions";
    
    public $id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $date = NULL;
    
    public $status = NULL;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id = 0)
    {
        $competitions = array();
        
        if($id)
            $this->db->where(array("id" => $id));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $competitions[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($competitions) : $competitions;
    }
    /**
     * Get Competition Segments
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function segments()
    {
        $segments = array();
        
        if($this->id)
        {
            $this->load->model("system/Segment_model", "segment_model");
            
            $segments = $this->segment_model->by_competition($this->id);
        }
        
        return $segments;
    }
}