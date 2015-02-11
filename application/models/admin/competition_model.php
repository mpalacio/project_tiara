<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competition_model extends PT_Model {
    public static $table = "competitions";
    
    public $id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $date = NULL;
    
    public $status = 1;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get Competition(s)
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
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
            $this->load->model("admin/Segment_model", "segment_model");
            
            $segments = $this->segment_model->by_competition($this->id);
        }
        
        return $segments;
    }
    /**
     * Get Single Competition Segment
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function segment($segment_id = 0)
    {
        $segments = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_model", "segment_model");
            
            $segment = $this->segment_model->get($segment_id, $this->id);
        }
        
        return $segment;
    }
    /**
     * Create Competition
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function create($data = array())
    {
        $competition = $this->instantiate($data);
        
        $competition->date = date("Y-m-d", strtotime($competition->date));
        
        $this->db->insert(self::$table, $competition);
        
        $competition->id = $this->db->insert_id();
        
        return $competition;
    }
}