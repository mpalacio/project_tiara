<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Contestant_model extends PT_Model {
    public static $table = "contestants";
    
    public $id = 0;
    
    public $competition_id = 0;
    
    public $first_name = NULL;
    
    public $middle_name = NULL;
    
    public $last_name = NULL;
    
    public $birthday = NULL;
    
    public $occupation = NULL;
    
    public $telephone = NULL;
    
    public $mobile = NULL;
    
    public $email = NULL;
    
    public $citizenship = NULL;
    
    public function __construct()
    {
        parent::__construct();
    }
    // OK
    public function get($id = 0, $competition_id = 0)
    {
        $contestants = $where = array();
        
        if($id)
            $where["id"] = $id;
        
        if($competition_id)
            $where["competition_id"] = $competition_id;
        
        $this->db->where($where);
        
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $contestants[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($contestants) : $contestants;
    }
    
    // OK
    public function create($data = array())
    {
        $contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $contestant);
        
        $contestant->id = $this->db->insert_id();
        
        return $contestant;
    }
}