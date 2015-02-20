<?php

class Criteria_model extends PT_Model {
    public static $table = "criterias";
    
    public $id = 0;
    
    public $segment_id = 0;
    
    public $name = NULL;
    
    public $description = NULL;
    
    public $percentage = 0.00;
    
    public function __construct()
    {
	parent::__construct();
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
    public function get($id = 0, $segment_id = 0)
    {
	$segment_criterias = $where = array();
	
	if($id)
	    $where["id"] = $id;
	    
	if($segment_id)
	    $where["segment_id"] = $segment_id;
	    
	$this->db->where($where);
	
	$query = $this->db->get(self::$table);
    
	if($query->num_rows())
	{
	    foreach($query->result_array() AS $row)
		$segment_criterias[] = $this->instantiate($row);
	}
	
	return ($id) ? array_shift($segment_criterias) : $segment_criterias;
    }
    
    /**
     * Get Segment Where Criteria Belongs
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
     * Update Segment Criteria
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function update()
    {
	$criteria = NULL;
	
	if($this->id)
	{
	    $this->db->where(array("id" => $this->id));
	    
	    $criteria = $this;
	    
	    $this->db->update(self::$table, $criteria);
	}
	
	return $criteria;
    }
}