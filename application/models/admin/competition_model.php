<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competition_model extends PT_Model {
    public static $table = "competitions";
    
    public $id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $slug = NULL;
    
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
     * Get Competition By Slug
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get_by_slug($slug = NULL)
    {
        $competition = NULL;
        
        $this->db->where(array("slug" => $slug));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
            $competition = $this->instantiate($query->row_array());
        
        return $competition;
    }
    
    public function judges()
    {
        $judges = array();
        
        if($this->id)
        {
            $this->load->model("admin/Judge_model", "judge_model");
            
            $judges = $this->judge_model->by_competition($this->id);
        }
        
        return $judges;
    }
    
    public function judge($judge_id = 0)
    {
        $judge = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Judge_model", "judge");
            
            $judge = $this->judge->get($judge_id, $this->id);
        }
        
        return $judge;
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
            $this->load->model("admin/Segment_model", "segment");
            
            $segments = $this->segment->get(0, $this->id);
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
        $segment = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_model", "segment");
            
            $segment = $this->segment->get($segment_id, $this->id);
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
        
        $competition->slug = url_title($competition->name, "-", TRUE);
        
        $this->db->insert(self::$table, $competition);
        
        $competition->id = $this->db->insert_id();
        
        return $competition;
    }
}