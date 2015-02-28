<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competitions extends PT_Controller {
    public $competition = NULL;
    
    public function __construct()
    {
	parent::__construct();
	
	$this->load->model("admin/Competition_model", "competition_model");
	
	$slug = $this->uri->segment(1);
	
	$this->competition = $this->competition_model->get_by_slug($slug);
    }
    
    public function index()
    {
	$this->load->library("form_validation");
	
	if($this->form_validation->run("login") == FALSE)
	{
	    $this->load->view("template/header", array(
		    "styles" => array(
			"tiara/cover", 
			"tiara/tiara"
		    ),
		    "nav" => $this->load->view("template/cover/nav")
		)
	    );
	    
	    $this->load->view("competitions/index", array("competition" => $this->competition));
	    $this->load->view("template/footer", array("copyright" => TRUE));
	}
	else
	{
	    redirect($this->competition->slug . "/judges");
	}
    }
    /**
     * Login Callback
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function authenticate($password)
    {
	$this->load->model("admin/Judge_model", "judge_model");
	
	$username = $this->input->post("username");
	
	$judge = $this->judge_model->authenticate($username, $password);
	
	if($judge)
	{
	    if($this->competition->judge($judge->id) == NULL)
		return FALSE;
    
	    $j = array("id" => $judge->id);
	    
	    $this->session->set_userdata("judge", json_encode($j));
	    
	    return TRUE;
	}
	
	return FALSE;
    }
    
    /**
     * Logout
     *
     * Description
     *
     * @author Gertrude R
     * @since 1.0.0
     * @version 1.0.0
     */
    public function logout($slug)
    {
	$this->session->unset_userdata("judge");
	
	redirect($slug);
    }
}