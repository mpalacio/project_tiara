<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Segments extends PT_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library("security");
        
        $this->load->model("admin/Competition_model", "competition_model");
    }

    public function index($competition_id)
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
        
        $this->load->view("administrator/segments/partial/index", array("competition" => $competition));
        
        $this->load->view("template/footer", array(
                "scripts" => array(
                    "tiara/admin/competitions"
                )
            )
        );
    }
    
    public function view($id, $competition_id)
    {
        $this->load->view("template/header", array(
                "title" => "Sample | Index",
                "styles" => array(
                    "tiara/tiara",
                    "jquery/file-upload/jquery.fileupload",
                    "jquery/file-upload/jquery.fileupload-ui",
                    "jquery/file-upload/style"
                ),
                "nav" => $this->load->view("template/nav", array(), TRUE)
            )
        );
        
        $competition = $this->competition_model->get($competition_id);
        
        $this->load->helper("string_helper");
        
        $this->load->view("administrator/segments/partial/view", array("competition" => $competition, "segment" => $competition->segment($id)));
        
        $this->load->view("template/footer", array(
                "scripts" => array(
                    "tiara/admin/criterias", 
                    "tiara/admin/contestants", 
                    "tiara/admin/judges",
                    "jquery/jquery-ui/jquery.ui.widget",
                    "jquery/templates/tmpl.min",
                    "jquery/load-image/load-image.all.min",
                    "jquery/canvas-to-blob/canvas-to-blob.min",
                    "jquery/gallery/jquery.blueimp-gallery.min",
                    "jquery/file-upload/jquery.iframe-transport",
                    "jquery/file-upload/jquery.fileupload",
                    "jquery/file-upload/jquery.fileupload-process",
                    "jquery/file-upload/jquery.fileupload-image",
                    "jquery/file-upload/jquery.fileupload-audio",
                    "jquery/file-upload/jquery.fileupload-video",
                    "jquery/file-upload/jquery.fileupload-validate",
                    "jquery/file-upload/jquery.fileupload-ui",
                    "jquery/input-mask/jquery.inputmask.min",
                    "jquery/input-mask/jquery.inputmask.numeric.extensions.min",
                    "tiara/main"
                )
            )
        );
    }
    public function ranking($limit = 0, $id, $competition_id = 0)
    {
        $this->load->model("admin/Competition_model", "competition_model");
	
	$competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($id);
	
	$this->load->view("template/header", array(
                "title" => "Sample | Index",
            )
        );
	
	$this->load->view("administrator/rankings/sheet", array("competition" => $competition, "segment" => $segment));
	
	$this->load->view("template/footer");
    }
}