<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getStatus($id=FALSE){

		if($id===FALSE){
			$query=$this->db->get('statuses');
			return $query->result_array();
		}

		$query=$this->db->get_where('statuses', array('statusid' => $id, ));
		return $query->row_array();
	}

	public function saveStatus($data,$id=0){
		
	if($id==0){
		  return $this->db->insert('statuses',$data);
		}
		$this->db->where('statusid',$id);
		return $this->db->update('statuses',$data);
		
	}  public function delete($id){

		$query = $this->db->get_where('contracts',array('status_id'=>$id));

		if(!$query->result_array() ){

			$this->db->delete('statuses',array('statusid'=> $id));
			return TRUE;

			}
		return FALSE;
	}

}