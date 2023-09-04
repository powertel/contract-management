<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractType_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getContractTypes($id=FALSE){

		if($id===FALSE){
			$query=$this->db->get('contract_types');
			return $query->result_array();
		}

		$query=$this->db->get_where('contract_types', array('contracttypeid' => $id, ));
		return $query->row_array();
	}

	public function createContractType($data){
		

		return $this->db->insert('contract_types',$data);
	}

	public function delete($id){

		$query = $this->db->get_where('contracts',array('status_id'=>$id));

		if(!$query->result_array() ){

			$this->db->delete('contract_types',array('contracttypeid'=> $id));
			return TRUE;

			}
		return FALSE;
	}

}