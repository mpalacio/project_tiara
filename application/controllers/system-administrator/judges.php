<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Judges extends PT_Controller {

    public function __construct()
    {
	parent::__construct();
    }
    
    public function create($segment_id, $competition_id)
    {
	$this->load->model("admin/Competition_model", "competition_model");
	
	// AJAX Request
	if($this->input->is_ajax_request())
	{
	    $competition = $this->competition_model->get($competition_id);
	    
	    $data = array("modal" => $this->load->view("administrator/judges/modal/create", array("segment" => $competition->segment($segment_id)), TRUE));
            
            echo $this->response->success($data);
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
	    
	    $this->load->view("administratorsegments/partial/view", array("competition" => $competition, "segment" => $competition->segment($segment_id)));
	    
	    $this->load->view("template/footer", array(
		    "modal" => $this->load->view("administrator/judges/modal/create", array("segment" => $competition->segment($segment_id)), TRUE),
		    "scripts" => array(
			"tiara/admin/judges"
		    )
		)
	    );
	}
    }
    
    public function import($source_segment_id, $segment_id, $competition_id)
    {
	$this->load->model("admin/Competition_model", "competition_model");
	
	// AJAX Request
	if($this->input->is_ajax_request())
	{
	    $competition = $this->competition_model->get($competition_id);
	    
	    $data = array("modal" => $this->load->view("administrator/judges/modal/import", array("source_segment" => $competition->segment($source_segment_id), "segment" => $competition->segment($segment_id)), TRUE));
            
            echo $this->response->success($data);
	}
	// GET Request
	else
	{
	    
	}
    }
    public function join($segment_id, $competition_id)
    {
	$segment_judges = json_decode($this->input->post("segment_judges"), TRUE);
	
	$this->load->model("admin/Segment_model", "segment_model");
	
	$segment = $this->segment_model->get($segment_id, $competition_id);
	
	if($segment AND count($segment_judges))
	{
	    $this->load->model("admin/Segment_judge_model", "segment_judge_model");
	    
	    foreach($segment_judges AS $segment_judge)
	    {
		$segment_judge["segment_id"] = $segment->id;
		
		$this->segment_judge_model->create($segment_judge);
	    }
	}
	
	$data = array(
	    "partial" => $this->load->view("administrator/judges/partial/index", array("competition" => $segment->competition(), "segment" => $segment), TRUE)
	);
	
	echo $this->response->success($data);
    }
    /**
     * Save Judge
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function save($segment_id, $competition_id)
    {
	$judge = json_decode($this->input->post("judge"), TRUE);
    
	$segment_judge = json_decode($this->input->post("segment_judge"), TRUE);
    
	$this->load->model("admin/Segment_model", "segment_model");
	
	$segment = $this->segment_model->get($segment_id, $competition_id);
	
	if($segment)
	{
	    /**
	     * Create New Judge
	     * @code begin
	     */
	    $this->load->model("admin/Judge_model", "judge_model");
	    
	    $judge["competition_id"] = $competition_id;
	    
	    $judge = $this->judge_model->create($judge);
	    /**
	     * Create New Judge
	     * @code end
	     */
	    
	    /**
	     * Create New Segment Judge
	     * @code begin
	     */ 
	    if($judge)
	    {
		$this->load->model("admin/Segment_judge_model", "segment_judge_model");
		
		$segment_judge["segment_id"] = $segment->id;
		$segment_judge["judge_id"] = $judge->id;
		
		$segment_judge = $this->segment_judge_model->create($segment_judge);
	    }
	    /**
	     * Create New Segment Judge
	     * @code end
	     */ 
	}
	
	$data = array(
	    "partial" => $this->load->view("administrator/judges/partial/index", array("segment" => $segment), TRUE)
	);
	
	echo $this->response->success($data);
    }
    /**
     * Segment Judge
     */
    public function sheet($fill, $segment_judge_id, $segment_id, $competition_id)
    {
	$this->load->model("admin/Competition_model", "competition_model");
	
	$competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($segment_id);
	
	$this->load->model("admin/Segment_judge_model", "segment_judge_model");
	
	$segment_judge = $this->segment_judge_model->get($segment_judge_id);
	
	$this->load->model("admin/Segment_contestant_model", "segment_contestant_model");
	
	$this->load->view("template/header", array(
                "title" => "Tiara | " . $competition->name . " - " . $segment->name,
            )
        );
	
	$segment_page = $segment->page();
	
	$this->load->view($segment_page->judge, array("competition" => $competition, "segment" => $segment, "segment_judge" => $segment_judge, "fill" => $fill));
	
	$this->load->view("template/footer");
    }
    /**
     * Update Judge
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function update($id, $segment_id, $competition_id)
    {
	
    }
}