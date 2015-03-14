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
        $competition = $this->competition_model->get($competition_id);
	
	$this->load->view("template/header", array(
                "title" => "Tiara | " . $competition->name,
                "styles" => array(
                    "tiara/tiara"
                ),
                "nav" => $this->load->view("template/nav", array(), TRUE)
            )
        );
        
        $this->load->view("administrator/segments/partial/index", array("competition" => $competition));
        
        $this->load->view("template/footer", array(
                "scripts" => array(
                    "tiara/main",
                    "tiara/admin/competitions",
                    "tiara/admin/segments"
                )
            )
        );
    }
    
    public function close($id, $competition_id)
    {
        $competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($id);
        
        $segment->status = 0;
        
        $segment->update();
        
        foreach($segment->judges() AS $segment_judge)
        {
            $segment_judge->status = 0;
            $segment_judge->update();
        }
        
        $data = array(
	    "partial" => $this->load->view("administrator/segments/partial/index", array("competition" => $competition), TRUE)
	);
        
        echo $this->response->success($data);
    }
    
    public function open($id, $competition_id)
    {
        $competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($id);
        
        $segment->status = 1;
        
        $segment->update();
        
        foreach($segment->judges() AS $segment_judge)
        {
            $segment_judge->status = 1;
            $segment_judge->update();
        }
        
        $data = array(
	    "partial" => $this->load->view("administrator/segments/partial/index", array("competition" => $competition), TRUE)
	);
        
        echo $this->response->success($data);
    }
    public function view($id, $competition_id)
    {
        $competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($id);
	
	$this->load->view("template/header", array(
                "title" => "Tiara | " . $competition->name . " - " . $segment->name,
                "styles" => array(
                    "tiara/tiara",
                    "jquery/file-upload/jquery.fileupload",
                    "jquery/file-upload/jquery.fileupload-ui",
                    "jquery/file-upload/style"
                ),
                "nav" => $this->load->view("template/nav", array(), TRUE)
            )
        );
        
        $this->load->helper("string_helper");
        
        $this->load->view("administrator/segments/partial/view", array("competition" => $competition, "segment" => $segment));
        
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
    public function rankings($limit = 0, $id, $competition_id = 0)
    {
        $this->benchmark->mark( __FUNCTION__ . "-begin");
        
        $this->load->model("admin/Competition_model", "competition_model");
	
	$competition = $this->competition_model->get($competition_id);
	
	$segment = $competition->segment($id);
	
	$this->load->view("template/header", array(
                "title" => "Tiara | " . $competition->name . " - " . $segment->name,
                "styles" => array(
                    "tiara/print"
                )
            )
        );
	
        $segment_page = $segment->page();
        
	$this->load->view($segment_page->segment, array("competition" => $competition, "segment" => $segment, "limit" => $limit));
	
	$this->load->view("template/footer");
        
        $this->benchmark->mark(__FUNCTION__ . "-end");
        
        // echo $this->benchmark->elapsed_time(__FUNCTION__ . "-begin", __FUNCTION__ . "-end");
    }
}