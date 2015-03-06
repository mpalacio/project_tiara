<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_judge_model extends PT_Model {
    public static $table = "segment_judges";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $judge_id = 0;
    
    public $status = 1;
    /**
     * Class Constructor
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function __construct()
    {
	parent::__construct();
    }
    // OK
    public function create($data = array())
    {
	$segment_judge = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_judge);
        
        $segment_judge->id = $this->db->insert_id();
        
        return $segment_judge;
    }
    // OK
    public function get($id = 0, $judge_id = 0, $segment_id = 0)
    {
        $segment_judges = $where = array();
        
	if($id)
	    $where["id"] = $id;
	    
        if($judge_id)
            $where["judge_id"] = $judge_id;
        
	if($segment_id)    
	    $where["segment_id"] = $segment_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_judges[] = $this->instantiate($row);
        }
        
        return ($id OR ($judge_id AND $segment_id)) ? array_shift($segment_judges) : $segment_judges;
    }
    // OK
    public function judge()
    {
	$judge = NULL;
	
	if($this->judge_id)
	{
	    $this->load->model("admin/Judge_model", "judge_model");
	    
	    $judge = $this->judge_model->get($this->judge_id);
	}
	
	return $judge;
    }
    // OK
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
    public function scores()
    {
	$segment_judge_scores = array();
	
	if($this->id)
	{
	    $this->load->model("admin/Segment_judge_score_model", "segment_judge_score_model");
	    
	    $segment_judge_scores = $this->segment_judge_score_model->get($this->id);
	}
	
	return $segment_judge_scores;
    }
    
    
    public function update()
    {
	$segment_judge = NULL;
	
	if($this->id)
	{
	    $this->db->where(array("id" => $this->id));
	    
	    $segment_judge = $this;
	    
	    $this->db->update(self::$table, $segment_judge);
	}
	
	return $segment_judge;
    }
}