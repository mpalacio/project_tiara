<?php
class Segment_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	function get_segments() {
		return $this->db->get('segments');
	}

	function add_segment() {
		$this->input->post('_date_created') = now();
		$this->db->insert('segments', $this->input->post());
	}

	function delete_segment() {
		$this->db->delete('segments', $this->input->post());
	}

	function edit_segment() {
		$fields = array();
		foreach (array('first_name', 'last_name', 'username', 'password', 'status') as $field)
			if(isset($this->input->post($field)))
				$fields[$field] => $this->input->post($field);
		$fields['_date_modified'] = now();
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('segments', $fields);
	}

}
?>