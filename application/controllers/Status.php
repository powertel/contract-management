<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('status_model');
		$this->load->helper('form','url');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()){
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

	}

	public function index(){

		$data['title'] = "Statuses";
		$data['statuses'] = $this->status_model->getStatus();
		$data['success']=$this->session->flashdata('message');
		$this->load->view('common/header',$data);
		$this->load->view('statuses/list_statuses',$data);
		$this->load->view('common/footer');

	}

	public function create(){
		$data['title'] = "Create Status";
	
		$data['success']=$this->session->flashdata('message');
		
		$this->load->view('common/header',$data);
		$this->load->view('statuses/create_status',$data);
		$this->load->view('common/footer');

	}

	public function edit($id=NULL){

		$data['title'] = "Edit Status";
		$data['status_item']=$this->status_model->getStatus($id);
		$data['success']=$this->session->flashdata('message');;
		

		$this->load->view('common/header',$data);
		$this->load->view('statuses/edit_status',$data);
		$this->load->view('common/footer');

	}
	public function save($id=0){

		if($id==0){
				
			$data['title']="Create Status ";
			$uploaddata=$this->bindFields('create_status','Create Status');
			//var_dump($uploaddata);exit;
				
			$this->session->set_flashdata('message', 'A new status created successfully.');
			$this->status_model->saveStatus($uploaddata,$id);
			redirect('status/create');
				
				

			}elseif($id>=1){
				$data['title']="Edit Status ";
				$uploaddata=$this->bindFields('edit_status','Edit Status ');
				
				$this->session->set_flashdata('message', 'Status edited successfully.');
				$this->status_model->saveStatus($uploaddata,$id);
				redirect('status/edit/'.$id);

			}

	}

	private function bindFields($page,$title=''){
		$fdata=array();
		$this->form_validation->set_rules('status','Status','required');
		if($this->form_validation->run()=== FALSE){
					$data['title']=$title;
					$this->load->view('common/header', $data);
		            $this->load->view('statuses/'.$page, array('error' => ' ' ));
		            $this->load->view('common/footer');
		}else{
			$fdata = array(
						'status'=>$this->input->post('status'),
						'status_color'=>$this->input->post('status_color')
					);

			return $fdata;
			}
	}

	public function delete($id){
		if($this->status_model->delete($id)==FALSE)	{
			$this->session->set_flashdata('message', 'This Status cannot be deleted.');
			redirect('status');
		}elseif($this->status_model->delete($id)==TRUE){
			if($id > 0){
					$this->status_model->delete($id);
					$this->session->set_flashdata('message', 'Status deleted successfully.');
					redirect('status');
			}
		}
		
	}
}