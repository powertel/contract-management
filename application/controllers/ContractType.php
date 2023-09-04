<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractType extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('contracttype_model');
		$this->load->helper('form','url');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()){
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		

	}

	public function index(){

		$data['title'] = "Contracts Types";
		$data['ctypes'] = $this->contracttype_model->getContractTypes();
		$data['success']=$this->session->flashdata('message');
		$this->load->view('common/header',$data);
		$this->load->view('contract_types/list_contracttypes',$data);
		$this->load->view('common/footer');

	}

	public function create(){
		$data['title'] = "Create Contract Type";
	
		$data['success']=$this->session->flashdata('message');;
		
		$this->load->view('common/header',$data);
		$this->load->view('contract_types/create_contracttype',$data);
		$this->load->view('common/footer');

	}

	public function edit($id=NULL){

		$data['title'] = "Edit Contract Type";
		$data['contract_item_type']=$this->contracttype_model->getContractTypes($id);
		

		$this->load->view('common/header',$data);
		$this->load->view('contract_types/edit_contracttype',$data);
		$this->load->view('common/footer');

	}
	public function save(){
		$this->form_validation->set_rules('contract_type','Contract Type','required');
		$data['title']="Create Contract Type ";
		
		
		if($this->form_validation->run()=== FALSE){
			
			$this->load->view('common/header', $data);
            $this->load->view('contract_types/create_contracttype', array('error' => ' ' ));
            $this->load->view('common/footer');
		}else{
			$data = array(
				'type'					=>		$this->input->post('contract_type')

		);

			$this->session->set_flashdata('message', 'A new contract type created successfully.');
			$this->contracttype_model->createContractType($data);
			redirect('contracttype');
		}

	}

	public function delete($id){
		if($this->contracttype_model->delete($id)==FALSE)	{
			$this->session->set_flashdata('message', 'The Contract type cannot be deleted because it is associated with one or more contracts.');
			redirect('contracttype');
		}elseif($this->contracttype_model->delete($id)==TRUE){
			if($id > 0){
					$this->contracttype_model->delete($id);
					$this->session->set_flashdata('message', 'Contract Type deleted successfully.');
					redirect('contracttype');
			}
		}
		
	}

}