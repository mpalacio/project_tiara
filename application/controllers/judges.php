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
	}

	public function competition_segments(){
		$this->load->model("Segment_model", "segment_model");
		$judge_id = 1;

		$competition_segments = $this->segment_model->get_competition_segments($judge_id);

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

	public function judging($segment_id){
		$this->load->model("Segment_model", "segment_model");
		$judge_id = 1;

		$segment_criterias = $this->segment_model->get_segment_criterias($segment_id);
		$segment_as_criteria_criterias = $this->segment_model->get_segment_as_criteria_criterias($segment_id);
		$contestants = $this->segment_model->get_contestants($segment_id);
		$segment_judge = $this->segment_model->get_segment_judge($judge_id, $segment_id);

		$this->load->view("template/header", array(
			"title" => "Sample | Index",
			"styles" => array(
				"tiara/tiara"
			),
			"nav" => $this->load->view("judges/nav", array(), TRUE)
		));
		$this->load->view("judges/partial/judging", compact('segment_criterias', 'segment_as_criteria_criterias', 'contestants', 'segment_judge'));
		$this->load->view("template/footer", array(
			"scripts" => array(
				"tiara/judges"
			)
		));
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
