<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competitions extends PT_Controller {
    public function __construct()
    {
	parent::__construct();
	
	$this->load->model("admin/Competition_model", "competition_model");
    }
    
    public function index($slug = NULL)
    {
	$this->load->library("form_validation");
	
	if($this->form_validation->run("login") == FALSE)
	{
	    $competition = $this->competition_model->get_by_slug($slug);

	    $this->load->view("template/header", array(
		    "styles" => array(
			"tiara/cover"
		    ),
		    "nav" => $this->load->view("template/cover/nav")
		)
	    );
	    
	    $this->load->view("competitions/index", array("competition" => $competition));
	    $this->load->view("template/footer");
	}
	else
	{
	    redirect("judge/1");
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
	return TRUE;
    }
}