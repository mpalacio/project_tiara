<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * Segment Model
 *
 * @version 1.1
 */
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
    // OK
    public function criteria($criteria_id = 0)
    {
        $criteria = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Criteria_model", "criteria_model");
            
            $criteria = $this->criteria_model->get($criteria_id, $this->id);
        }
        
        return $criteria;
    }
    // OK
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
    public function competition()
    {
        $competition = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Competition_model", "competition_model");
            
            $competition = $this->competition_model->get($this->competition_id);
        }
        
        return $competition;
    }
    // OK
    public function contestant($contestant_id = 0)
    {
        $segment_contestant = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
            
            $segment_contestant = $this->segment_contestant_model->get(0, $contestant_id, $this->id);
        }
        
        return $segment_contestant;
    }
    // OK
    public function contestants()
    {
        $segment_contestants = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
            
            $segment_contestants = $this->segment_contestant_model->get(0, 0, $this->id);
        }
        
        return $segment_contestants;
    }
    // OK
    public function contestants_by_ranking($limit = 0)
    {
        $segment_contestants = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
            
            $segment_contestants = $this->segment_contestant_model->get_by_ranking($this->id, $limit);
        }
        
        return $segment_contestants;
    }
    // OK
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
    
    // OK
    public function get_by_slug($slug, $competition_id)
    {
        $segment = NULL;
        
        if($slug == NULL)
            return $segment;
        
        $this->db->where(array("slug" => $slug, "competition_id" => $competition_id));
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
            $segment = $this->instantiate($query->row_array());
            
        return $segment;
    }
    // OK
    public function judge($judge_id = 0)
    {
        $segment_judge = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_judge_model", "segment_judge_model");
            
            $segment_judge = $this->segment_judge_model->get(0, $judge_id, $this->id);
        }
        
        return $segment_judge;
    }
    // OK
    public function judges()
    {
        $segment_judges = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_judge_model", "segment_judge_model");
            
            $segment_judges = $this->segment_judge_model->get(0, 0, $this->id);
        }
        
        return $segment_judges;
    }
    // OK
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
    // OK
    public function page()
    {
        $segment_page = NULL;
        
        if($this->id)
        {
            $this->load->model("admin/Segment_page_model", "segment_page_model");
            
            $segment_page = $this->segment_page_model->get_by_segment($this->id);
        }
        
        return $segment_page;
    }
    /**
     * @since 1.1
     */
    public function segments_ac()
    {
        $segments_ac = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_ac_model", "segment_ac_model");
            
            $segments_ac = $this->segment_ac_model->get(0, $this->id);
        }
        
        return $segments_ac;
    }
    
    public function update()
    {
        if($this->id)
	{
	    $this->db->where(array("id" => $this->id));
	    
	    $segment = $this;
	    
	    $this->db->update(self::$table, $segment);
	}
        
        return $segment;
    }
}