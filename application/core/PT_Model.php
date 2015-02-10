<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * Project Tiara Sub-class Model
 *
 * @author Gertrude R
 * @version 1.0.0
 */
class PT_Model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function instantiate($data = array())
    {
        $instance = new $this;
        
        if(is_array($data) AND count($data))
        {
            foreach($data AS $key => $value)
            {
                $key = str_replace("-", "_", $key);
                
                if(property_exists($instance, $key))
                    $instance->$key = $value;
            }
        }
        
        return $instance;
    }
}
/** End of file PT_Model.php */
/** Location: .application/core/PT_Model.php */