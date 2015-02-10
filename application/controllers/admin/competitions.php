<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Competitions extends PT_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
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