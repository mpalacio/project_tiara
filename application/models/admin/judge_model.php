<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Judge_model extends PT_Model {
    public static $table = "judges";

    public $id = 0;
    
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
    
    public function get($id = 0)
    {
	$judges = array();
        
        if($id)
            $this->db->where(array("id" => $id));
            
        $query = $this->db->get(self::$table);
        
        if($query->num_rows())
        {
            foreach($query->result_array() AS $row)
                $judges[] = $this->instantiate($row);
        }
        
        return ($id) ? array_shift($judges) : $judges;
    }
    
    public function create($data = array())
    {
	$judge = $this->instantiate($data);
        
	$judge->password = $this->encrypt->sha1($judge->password);
	
        $this->db->insert(self::$table, $judge);
        
        $judge->id = $this->db->insert_id();
        
        return $judge;
    }
}