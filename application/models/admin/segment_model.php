<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segment_model extends PT_Model {
    public static $table = "segments";

    public $id = 0;
    
    public $competition_id = 0;
    
    public $name = NULL;
    
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
        $segment = NULL;
        
        $where = array("id" => $id);
        
        if($competition_id)
            $where["competition_id"] = $competition_id;
        
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
            $segment = $this->instantiate($query->row_array());
        
        return $segment;
    }
    
    /**
     * Get Segments By Competition
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function by_competition($competition_id = 0)
    {
        $segments = array();
        
        if($competition_id)
        {
            $this->db->where(array("competition_id" => $competition_id));
            
            $query = $this->db->get(self::$table);
            
            if($query->num_rows())
            {
                foreach($query->result_array() AS $row)
                    $segments[] = $this->instantiate($row);
            }
        }
        
        return $segments;
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
    public function segment_contestants()
    {
        $segment_contestants = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
            
            $segment_contestants = $this->segment_contestant_model->by_segment($this->id);
        
            print_r($contestants);
        }
        
        return $segment_contestants;
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
    public function segment_judges()
    {
        $segment_judges = array();
        
        if($this->id)
        {
            $this->load->model("admin/Segment_judge_model", "segment_judge_model");
            
            $segment_judges = $this->segment_judge_model->by_segment($this->id);
        }
        
        return $segment_judges;
    }
}