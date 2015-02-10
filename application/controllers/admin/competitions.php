<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competitions extends PT_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library("security");
        
        $this->load->model("admin/Competition_model", "competition_model");
    }
    
    public function index()
    {
        $competitions = array();
        
        $competitions = $this->competition_model->get();
        
        $this->load->view("template/header", array(
                "title" => "Sample | Index",
                "styles" => array(
                    "tiara/tiara"
                ),
                "nav" => $this->load->view("template/nav", array(), TRUE)
            )
        );
        
        $this->load->view("admin/competitions/partial/index", array("competitions" => $competitions));
        
        $this->load->view("template/footer", array(
                "scripts" => array(
                    "tiara/admin/competitions"
                )
            )
        );
    }
    
    
    public function create()
    {
        // AJAX Request
        if($this->input->is_ajax_request())
        {
            $data = array("modal" => $this->load->view("admin/competitions/modal/create", array(), TRUE));
            
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
            
            $this->load->view("admin/competitions/partial/index");
            
            $this->load->view("template/footer", array(
                    "modal" => $this->load->view("admin/competitions/modal/create", array(), TRUE),
                    "scripts" => array(
                        "tiara/admin/competitions"
                    )
                )
            );
        }
    }
    
    
    public function save()
    {
        $competition = $this->input->post("competition");
        
        $competition = $this->competition_model->create(json_decode($competition, TRUE));
        
        echo json_encode($competition);
    }
    public function edit($id = 0)
    {
        if($this->input->is_ajax_request())
        {
            $data = array("modal" => $this->load->view("admin/competitions/modal/edit", array(), TRUE));
            
            echo json_encode(array("status" => "success", "data" => $data));
        }
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
            
            $this->load->view("admin/competitions/partial/index");
            
            $this->load->view("template/footer", array(
                    "modal" => $this->load->view("admin/competitions/modal/edit", array(), TRUE),
                    "scripts" => array(
                        "tiara/admin/competitions"
                    )
                )
            );
        }
    }
}