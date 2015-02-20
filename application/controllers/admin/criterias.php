<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Criterias extends PT_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Edit Segment Criteria
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function edit($id, $segment_id, $competition_id)
    {
	$this->load->model("admin/Segment_model", "segment_model");
	
	$segment = $this->segment_model->get($segment_id, $competition_id);
	
	// AJAX Request
	if($this->input->is_ajax_request())
	{
	    $data = array(
		"modal" => $this->load->view("admin/criterias/modal/edit", array("segment" => $segment, "criteria" => $segment->criteria($id)), TRUE)
	    );
	    
	    echo $this->response->success($data);
	}
	
	// GET Request
	else
	{
	    
	}
    }
    /**
     * Update Criteria
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function update($id, $segment_id, $competition_id)
    {
	$criteria = json_decode($this->input->post("criteria"), TRUE);
	
	$this->load->model("admin/Criteria_model", "criteria_model");
	
	$criteria = $this->criteria_model->instantiate($criteria);
	
	$criteria->id = $id;
	$criteria->segment_id = $segment_id;
	
	$criteria = $criteria->update();
	
	$data = array(
	    "partial" => $this->load->view("admin/criterias/partial/index", array("segment" => $criteria->segment()), TRUE)
	);
	
	echo $this->response->success($data);
    }
}