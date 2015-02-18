<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Sample extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
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
        $this->load->view("admin/contestants/index");
        
        $this->load->view("template/footer", array(
                "scripts" => array(
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
                    "jquery/file-upload/main",
                    "tiara/main"
                )
            )
        );
    }
}