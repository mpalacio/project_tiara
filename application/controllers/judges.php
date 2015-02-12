<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Judges extends PT_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("judges/nav", array(), TRUE)
		));
		$this->load->view("judges/partial/index");
		$this->load->view("template/footer");

		echo "";
	}

	public function competition_segments(){
		$this->load->model("Segment_model", "segment_model");

		$competition_segments = $this->segment_model->get_competition_segments(1);

		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("judges/nav", array(), TRUE)
		));

		$this->load->view("judges/partial/competition_segments", compact("competition_segments"));
		$this->load->view("template/footer");
	}

	public function judging($id){
		$this->load->model("Segment_model", "segment_model");

		$segment_criterias = $this->segment_model->get_segment_criterias($id);
		$segment_as_criteria_criterias = $this->segment_model->get_segment_as_criteria_criterias($id);
		$contestants = $this->segment_model->get_contestants($id);

		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("judges/nav", array(), TRUE)
		));
		$this->load->view("judges/partial/judging", compact('segment_criterias', 'segment_as_criteria_criterias', 'contestants'));
		$this->load->view("template/footer");
	}

	public function profile(){
		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("template/nav", array(), TRUE)
		));

		$this->load->view("judges/partial/judging");

		$this->load->view("template/footer", array(
			"modal" => $this->load->view("judges/modal/profile", array(), TRUE),
			"scripts" => array(
				"tiara/admin/competitions"
			)
		));
	}

	public function review(){
		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("template/nav", array(), TRUE)
		));

		$this->load->view("judges/partial/judging");

		$this->load->view("template/footer", array(
			"modal" => $this->load->view("judges/modal/review", array(), TRUE),
			"scripts" => array(
				"tiara/admin/competitions"
			)
		));
	 }

 }
