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
    
    public function get($id = 0)
    {
        $contestants = array();
        
        if($id)
            $this->db->where(array("id" => $id));
            
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $contestants[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($contestants) : $contestants;
    }
    
    public function create($data = array())
    {
        $contestant = $this->instantiate($data);
        
        $this->db->insert(self::$table, $contestant);
        
        $contestant->id = $this->db->insert_id();
        
        return $contestant;
    }
}