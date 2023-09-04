<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_model extends CI_Model{

	public function __construct(){
		
		$this->load->database();
	}

	public function getContracts($id=FALSE){
		$query = "";
		if($id===FALSE){
			$this->db->from('contracts');
			$this->db->join('statuses','statuses.statusid=contracts.status_id');
			$query=$this->db->get();
			return $query->result_array();
		}
		
		//$id = 18;
		$sql  = "SELECT * FROM contracts";
		$sql .= " JOIN statuses ON statuses.statusid = contracts.status_id";
		$sql .= " JOIN contract_types ON contract_types.contracttypeid=contracts.contract_type_id";
		$sql .= " WHERE contracts.id =".$id;

		//echo $sql;

		$query = $this->db->query($sql);

		//$query.=$this->db->get_where('contracts', array('id' => $id, ));
		//$query.=$this->db->join('status','status.id=contracts.status_id');
		//$query.=$this->db->join('contract_types','contract_types.id=contracts=contract_type_id');
		return $query->row_array();
	}

	public function saveContract($id=0,$data){

		if($id==0){

			return $this->db->insert('contracts',$data);
		}
		$this->db->where('id',$id);
		return $this->db->update('contracts',$data);
	}

	private function saveFile(){
		
	}

}