<?php
class Administrator_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function login() {
		$this->db->limit(1);
		$user = $this->db->where(array('username' => $this->input->post('username'), 'password' => $this->input->post('password')));
		return $user;
	}

}
?>