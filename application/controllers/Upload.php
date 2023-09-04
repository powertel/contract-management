<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controler{

	public function __construct(){
		parent::costruct();

	}

	public function do_upload(){

		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 100;
		$config['file_name'] = $this->input->post('organisation').time();

		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('userfile')){
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('create_contract',$error);
		}
		else{
			$data = array('upload_data',$this->upload->data());
			//$data['uplaod_data'] = $this->upload->data()
			$this->load->view('upload',$data);
		}
	}

}