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
	$this->load->model("admin/Segment_model", "segment_model");
	
	// AJAX Request
	if($this->input->is_ajax_request())
	{
	    $segment = $this->segment_model->get($segment_id, $competition_id);
	    
	    $data = array("modal" => $this->load->view("admin/contestants/modal/create", array("segment" => $segment), TRUE));
	
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

    public function upload()
    {
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']	= '100';
	$config['max_width']  = '1024';
	$config['max_height']  = '768';
	$config['file_name'] = array(uniqid());
	
	$this->load->library('upload', $config);
	
	if ( ! $this->upload->do_multi_upload("files"))
	{
		$error = array('error' => $this->upload->display_errors());
		
	    print_r($error);
	}
	else
	{
	    $upload_path_url = base_url() . "uploads/";
	    $data = $this->upload->data();
	    
	    // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . '/thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 75;
            $config['height'] = 50;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
	    
	    //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'upload/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
	    
	    echo json_encode(array("files" => $files));
	}
    }
}