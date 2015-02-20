<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_judge_model extends PT_Model {
    public static $table = "segment_judges";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $judge_id = 0;
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
    /**
     * Get Segment Judge(s)
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get($id = 0, $segment_id = 0)
    {
        $segment_judges = $where = array();
        
        if($id)
            $where["id"] = $id;
            
        if($segment_id)
            $where["segment_id"] = $segment_id;
            
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $segment_judges[] = $this->instantiate($row);
        }
        
        return $segment_judges;
    }
    /**
     * Get Judge
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
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
    
    /**
     * Get Segment
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
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
    /**
     * Create Segment
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function create($data = array())
    {
	$segment_judge = $this->instantiate($data);
        
        $this->db->insert(self::$table, $segment_judge);
        
        $segment_judge->id = $this->db->insert_id();
        
        return $segment_judge;
    }
}