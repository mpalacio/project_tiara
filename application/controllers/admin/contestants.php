<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Contestants extends PT_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library("security");
        
        $this->load->model("admin/Contestant_model", "contestant_model");
    }
    
    /**
     * 
     */
    public function create($segment_id, $competition_id)
    {
	$this->load->model("admin/Competition_model", "competition_model");
	
	// AJAX Request
	if($this->input->is_ajax_request())
	{
	    $competition = $this->competition_model->get($competition_id);
	    
	    $data = array("modal" => $this->load->view("admin/contestants/modal/create", array("segment" => $competition->segment($segment_id)), TRUE));
	
	    echo json_encode(array("status" => "success", "data" => $data));
	}
	// GET Request
	else
	{
	    $this->load->view("template/header", array(
		    "title" => "Sample | Index",
		    "styles" => array(
			"tiara/tiara"
		    ),
		    "nav" => $this->load->view("template/nav", array(), TRUE)
		)
	    );
	    
	    $competition = $this->competition_model->get($competition_id);
	    
	    $this->load->view("admin/segments/partial/view", array("competition" => $competition, "segment" => $competition->segment($segment_id)));
	    
	    $this->load->view("template/footer", array(
		    "modal" => $this->load->view("admin/contestants/modal/create", array("segment" => $competition->segment($segment_id)), TRUE),
		    "scripts" => array(
			"tiara/admin/judges"
		    )
		)
	    );
	}
    }
    
    /**
     * Create New Contestant
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function save($segment_id, $competition_id)
    {
	$contestant = json_decode($this->input->post("contestant"), TRUE);
	
	$this->load->model("admin/Competition_model", "competition_model");
	
	$competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($segment_id);
	
	$segment_contestant = $segment->new_contestant($contestant);
	
	echo $this->response->success();
    }
}