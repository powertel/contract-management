<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model{

		public function __construct(){
		$this->load->database();
	}

	public function getReminder(){

		$query = $this->db->select('end_date,organisation_name');
		$query = $this->db->get('contracts');
		//var_dump($query ->result());exit;
		return $query ->result();


	}

	public function getEmail(){
		$query = $this->db->select('email');
		$query = $this->db->get('users');
		return $query ->result_array();
	}
}