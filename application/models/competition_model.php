<?php
class Competition_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	function get_competitions() {
		return $this->db->get('competitions');
	}

	function add_competition() {
		$this->input->post('_date_created') = now();
		$this->db->insert('competitions', $this->input->post());
	}

	function delete_competition() {
		$this->db->delete('competitions', $this->input->post());
	}

	function edit_competition() {
		$fields = array();
		foreach (array('name', 'description', 'date', 'status') as $field)
			if(isset($this->input->post($field)))
				$fields[$field] => $this->input->post($field);
		$fields['_date_modified'] = now();
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('competitions', $fields);
	}

}
?>