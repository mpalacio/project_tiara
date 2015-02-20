<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Judge_model extends PT_Model {
    public static $table = "judges";

    public $id = 0;
    
    public $competition_id = 0;
    
    public $first_name = 0;
    
    public $last_name = 0;
    
    public $username = NULL;
    
    public $password = NULL;
    
    public $status = 1;
    
    public function __construct()
    {
	parent::__construct();
	
	$this->load->library("encrypt");
    }
    
    /**
     * Authenticate Judge
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function authenticate($username = NULL, $password = NULL)
    {
	$judge = NULL;
	
	$this->db->where(array("username" => $username, "password" => $this->encrypt->sha1($password)));
	
	$query = $this->db->get(self::$table);
	
	if($query->num_rows())
	    $judge = $this->instantiate($query->row_array());
	    
	return $judge;
    }
    /**
     * Get Judge(s)
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function get($id = 0, $competition_id = 0)
    {
	$judges = $where = array();
        
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
                $judges[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($judges) : $judges;
    }
    
    /**
     * Create New Judge
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function create($data = array())
    {
	$judge = $this->instantiate($data);
        
	$judge->password = $this->encrypt->sha1($judge->password);
	
        $this->db->insert(self::$table, $judge);
        
        $judge->id = $this->db->insert_id();
        
        return $judge;
    }
    /**
     * Get Judge Segments
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
	    
	    $this->db->select("segments.*");
	    $this->db->join("segment_judges", "segment_judges.segment_id = segments.id", "left");
	    $this->db->where(array("segment_judges.judge_id" => $this->id));
	    
	    $query = $this->db->get("segments");
	    
	    if($query->num_rows())
	    {
		foreach($query->result_array() AS $row)
		    $segments[] = $this->segment_model->instantiate($row);
	    }
	}
	
	return $segments;
    }
    
    /**
     * Get Segment By Slug
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function segment_by_slug($slug = NULL)
    {
	if($this->id)
	{
	    foreach($this->segments() AS $segment)
		if($segment->slug == $slug)
		    return $segment;
	}
	
	return NULL;
    }
}