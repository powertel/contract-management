<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	// get last 5 added contracts

	public function getRecentContracts(){

		//$this->db->select('organisation_name, contract_name');
		//$query = $this->db->get('contracts');

		$this->db->select('organisation_name, contract_name,type');
		$this->db->from('contracts');
		$this->db->join('contract_types', 'contract_types.contracttypeid = contracts.contract_type_id');
		$this->db->limit(5);
		$this->db->order_by('date_created','DESC');
		$query = $this->db->get();

		return $query->result();
	}

	public function getRecentlyRenewed(){

		//$this->db->select('organisation_name, contract_name');
		//$query = $this->db->get('contracts');

		$this->db->select('organisation_name, contract_name,type');
		$this->db->from('contracts');
		$this->db->join('contract_types', 'contract_types.contracttypeid = contracts.contract_type_id');
		$this->db->where('status_id', 2);
		$this->db->limit(5);
		$this->db->order_by('date_renewed','DESC');
		$query = $this->db->get();

		return $query->result();
	}

	public function getRecentlyExpired(){

		//$this->db->select('organisation_name, contract_name');
		//$query = $this->db->get('contracts');

		$this->db->select('organisation_name, contract_name,end_date');
		$this->db->from('contracts');
		//$this->db->join('contract_types', 'contract_types.id = contracts.contract_type_id');
		$this->db->where('status_id', 3);
		$this->db->limit(5);
		$this->db->order_by('end_date','DESC');
		$query = $this->db->get();

		return $query->result();
	}

}
