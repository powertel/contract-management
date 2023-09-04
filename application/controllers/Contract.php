<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract extends CI_Controller{


	public function __construct(){
		parent::__construct();
		$this->load->model(array('status_model','contracttype_model','contract_model'));
		$this->load->helper(array('url','form','language'));
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
			{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
			}
		

	}

	public function index(){

		$data['title'] = "Contracts";
		$data['contracts'] = $this->contract_model->getContracts();
		$data['success']=$this->session->flashdata('message');

		$this->load->view('common/header',$data);
		$this->load->view('contracts/list_contracts',$data);
		$this->load->view('common/footer');

	}

	public function create(){
		$data['title'] = "Create New Contract";
		$data['contract_types'] = $this->contracttype_model->getContractTypes();
		$data['statuses'] = $this->status_model->getStatus();
	
			$data['success']=$this->session->flashdata('message');
		
		$this->load->view('common/header',$data);
		$this->load->view('contracts/create_contract',$data);
		$this->load->view('common/footer');

	}

	public function edit($id=NULL){
		$data['title'] = "Edit Contract";
		$data['contract_item']=$this->contract_model->getContracts($id);
		$data['contract_types'] = $this->contracttype_model->getContractTypes();
		$data['statuses'] = $this->status_model->getStatus();

		//var_dump($data['contract_item']);exit;

		$this->load->view('common/header',$data);
		$this->load->view('contracts/edit_contract',$data);
		$this->load->view('common/footer');

	}

	public function save($id=0){
		
		if ($id==0){
			$data['title']="Create New Contract ";
			$uploaddata=$this->bindFields();
			$this->session->set_flashdata('message', 'A new contract created successfully.');
			$this->contract_model->saveContract($id,$uploaddata);
			redirect('contract/create');

		}elseif ($id > 0) {
			$data['title']="Edit Contract ";
			$uploaddata=$this->bindFields();
			$uploaddata['status_id'] = $this->input->post('status');
			//var_dump($uploaddata);
			//exit;
			$this->session->set_flashdata('message', 'The contract '.$uploaddata['contract_name'].' has been edited successfully.');
			$this->contract_model->saveContract($id,$uploaddata);
			redirect('contract');
		}

	}


private function bindFields(){
	$fdata=array();
		$this->form_validation->set_rules('contract_name','Contract Name','required');
		$this->form_validation->set_rules('organisation','organisation','required');
		$this->form_validation->set_rules('end_date','End Date','required');
		$this->form_validation->set_rules('effective_date','Effective Date','required');
		$this->form_validation->set_rules('contact_person','Contact Person','required');
		$this->form_validation->set_rules('phone','Phone','required');
		//$this->form_validation->set_rules('contract_file','Attachment','required');
		
		$data['contract_types'] = $this->contracttype_model->getContractTypes();
		
		if($this->form_validation->run()=== FALSE){
			//redirect('contract/create');
			$this->load->view('common/header', $data);
            $this->load->view('contracts/create_contract', array('error' => ' ' ));
            $this->load->view('common/footer');
		}else{
			$fdata = array(
				'contract_type_id'			=>		$this->input->post('contract_type'),
				'organisation_name'			=>		$this->input->post('organisation'),
				'effective_date'			=>		$this->input->post('effective_date'),
				'end_date'					=>		$this->input->post('end_date'),
				'org_address'				=>		$this->input->post('address'),
				'contact_person'			=>		$this->input->post('contact_person'),
				'phone'						=>		$this->input->post('phone'),
				'file'						=>		$this->do_upload(),
				'contract_name'				=>		$this->input->post('contract_name'),
				'status_id'                 =>  2,//    $this->input->post('status'),
				'date_created'              => date("Y-m-d")

		);
	}

	return $fdata;
}


	public function do_upload(){

		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 100000000;
		$config['file_name'] = preg_replace('/\s+/', '', $this->input->post('organisation'))."_contract";//.'_'.time();

		//$full_path = $config['upload_path'].$config['file_name'].$config['allowed_types']
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('contract_file')){
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('contracts/create_contract',$error);
		}
		else{
			$data = array('upload_data',$this->upload->data());
			//$data['uplaod_data'] = $this->upload->data()
			///$this->load->view('upload',$data);
			
		}

		return substr($config['upload_path'], 1)."/".$config['file_name'].".".$config['allowed_types'];
	}


}