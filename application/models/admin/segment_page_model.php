<?php

class Segment_page_model extends PT_Model {
    public static $table = "segment_pages";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $judge = NULL;
    
    public $segment = NULL;
    
    public $sheet = NULL;
    
    public $script = NULL;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_by_segment($segment_id = 0)
    {
        $segment_template = NULL;
        
        $this->db->where(array("segment_id" => $segment_id));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            $segment_template = $this->instantiate($query->row_array());
        }
        
        return $segment_template;
    }
}
