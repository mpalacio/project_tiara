<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_model extends PT_Model {
    public static $table = "segments";

    public $id = 0;
    
    public $competition_id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $slug = NULL;
    
    public $date = NULL;
    
    public $venue = NULL;
    
    public $status = NULL;
    
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get Segment(s)
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get($id = 0, $competition_id = 0)
    {
        $segments = $where = array();
        
        if($id)
            $where["id"] = $id;
        
        if($competition_id)
            $where["competition_id"] = $competition_id;
        
        if(count($where))
            $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segments[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($segments) : $segments;
    }
    /**
     * Get Segment Criteria(s)
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function criterias()
    {
        $criterias = array();
        
        if($this->id)
        {
            $this->load->model("admin/Criteria_model", "criteria_model");
            
            $criterias = $this->criteria_model->get(0, $this->id);
        }
        
        return $criterias;
    }
    /**
     * Get Segment Criteria
     * @todo
     */
    public function criteria($criteria_id = 0)
    {
        $segment_criteria = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Criteria_model", "criteria_model");
            
            $segment_criteria = $this->criteria_model->get($criteria_id, $this->id);
        }
        
        return $segment_criteria;
    }
    /**
     * Get Segment Contestants
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function contestants()
    {
        $contestants = array();
        
        if($this->id)
        {
            $this->load->model("admin/Contestant_model", "contestant_model");
            
            $this->db->select("contestants.*");
	    $this->db->join("segment_contestants", "segment_contestants.contestant_id = contestants.id", "left");
	    $this->db->where(array("segment_contestants.segment_id" => $this->id));
	    
            $query = $this->db->get("contestants");
            
	    if($query->num_rows())
	    {
		foreach($query->result_array() AS $row)
		    $contestants[] = $this->contestant_model->instantiate($row);
	    }
        }
        
        return $contestants;
    }
    
    /**
     * Get Segment Judges
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function judges()
    {
        $judges = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_judge_model", "segment_judge_model");
            
            $segment_judges = $this->segment_judge_model->get(0, $this->id);
            
            foreach($segment_judges AS $segment_judge)
                $judges[] = $segment_judge->judge();
        }
        
        return $judges;
    }
    /**
     * Create New Segment Contestant
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function new_contestant($data = array())
    {
        $segment_contestant = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Contestant_model", "contestant_model");
            
            $data["competition_id"] = $this->competition_id;
            
            $contestant = $this->contestant_model->create($data);
            
            $this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
            
            $segment_contestant = $this->segment_contestant_model->create(array("segment_id" => $this->id, "contestant_id" => $contestant->id));
        }
        
        return $segment_contestant;
    }
}