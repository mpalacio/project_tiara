<?php
class Segment_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	function get_competition_segments($id) {
		$this->db->select('segments.name AS segment_name, competitions.name AS competition_name, segments.id AS segment_id');
		$this->db->from('segment_judges');
		$this->db->join('segments', 'segment_judges.segment_id = segments.id');
		$this->db->join('competitions', 'competitions.id = segments.competition_id');
		$this->db->where('segment_judges.judge_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_segment_criterias($id) {
		$this->db->where('segment_id', $id);
		$query = $this->db->get('segment_criterias');
		return $query->result();
	}

	function get_segment_as_criteria_criterias($id) {
		$this->db->select('segments_as_criteria.*, segments.name');
		$this->db->from('segments_as_criteria');
		$this->db->join('segments', 'segments.id = segments_as_criteria.node_segment_id');
		$this->db->where('segments_as_criteria.segment_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_contestants($id) {
		$this->db->select('segment_contestants.*, contestants.*, segment_contestants.id AS segment_contestant_id');
		$this->db->from('segment_contestants');
		$this->db->join('contestants', 'contestants.id = segment_contestants.contestant_id');
		$this->db->where('segment_contestants.segment_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_segment_judge($judge_id, $segment_id) {
		$this->db->from('segment_judges');
		$this->db->where('judge_id', $judge_id);
		$this->db->where('segment_id', $segment_id);
		$query = $this->db->get();
		return $query->row();
	}

}
?>