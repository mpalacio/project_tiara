<?php
class Contestant_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	function get_contestants() {
		return $this->db->get('contestants');
	}

	function add_contestant() {
		$this->input->post('_date_created') = now();
		$this->db->insert('contestants', $this->input->post());
	}

	function delete_contestant() {
		$this->db->delete('contestants', $this->input->post());
	}

	function edit_contestant() {
		$fields = array();
		foreach (array('competition_id', 'first_name', 'last_name', 'birthdate', 'occupation', 'detail') as $field)
			if(isset($this->input->post($field)))
				$fields[$field] => $this->input->post($field);
		$fields['_date_modified'] = now();
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('contestants', $fields);
	}

}
?>