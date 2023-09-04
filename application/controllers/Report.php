<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model(array('status_model','contracttype_model'));

		$this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()){
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}


	public function index(){
		$data['title']='Report';
		$data['contract_types']=$this->contracttype_model->getContractTypes();
		$data['statuses'] = $this->status_model->getStatus();
		$this->load->view('common/header',$data);
		$this->load->view('report/report',$data);
		$this->load->view('common/footer',$data);
	}
}

