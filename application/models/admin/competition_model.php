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
    
    // OK
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
    
    // OK
    public function get_by_slug($slug = NULL)
    {
        $competition = NULL;
        
        $this->db->where(array("slug" => $slug));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
            $competition = $this->instantiate($query->row_array());
        
        return $competition;
    }
    
    // OK
    public function judges()
    {
        $judges = array();
        
        if($this->id)
        {
            $this->load->model("admin/Judge_model", "judge_model");
            
            $judges = $this->judge_model->get(0, $this->id);
        }
        
        return $judges;
    }
    
    // OK
    public function judge($judge_id = 0)
    {
        $judge = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Judge_model", "judge_model");
            
            $judge = $this->judge_model->get($judge_id, $this->id);
        }
        
        return $judge;
    }
    // OK
    public function segment($segment_id = 0)
    {
        $segment = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_model", "segment_model");
            
            $segment = $this->segment_model->get($segment_id, $this->id);
        }
        
        return $segment;
    }
    // OK
    public function segment_by_slug($slug = NULL)
    {
        $segment = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_model", "segment_model");
            
            $segment = $this->segment_model->get_by_slug($slug, $this->id);
        }
        
        return $segment;
    }
    // OK
    public function segments()
    {
        $segments = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_model", "segment_model");
            
            $segments = $this->segment_model->get(0, $this->id);
        }
        
        return $segments;
    }
    // OK
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