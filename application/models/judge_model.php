<?php
class Judge_model extends CI_Model {

    function __construct()
    {
	parent::__construct();
	$this->load->helper('date');
    }

    function get_judges() {
	return $this->db->get('judges');
    }

    function add_judge() {
	$this->input->post('_date_created') = now();
	$this->db->insert('judges', $this->input->post());
    }

    function delete_judge() {
	$this->db->delete('judges', $this->input->post());
    }

    function edit_judge() {
	$fields = array();
	foreach (array('first_name', 'last_name', 'username', 'password', 'status') as $field)
	    if(isset($this->input->post($field)))
		    $fields[$field] => $this->input->post($field);
	$fields['_date_modified'] = now();
	$this->db->where('id', $this->input->post('id'));
	$this->db->update('judges', $fields);
    }
}