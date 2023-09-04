<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('dashboard_model');

		$this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()){
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

	}

	public function index(){

		$data['title']="Dashboard";
		$data['recent_contracts'] = $this->dashboard_model->getRecentContracts();
		$data['recently_rcontracts'] = $this->dashboard_model->getRecentlyRenewed();
		$data['recently_econtracts'] = $this->dashboard_model->getRecentlyExpired();

		$this->load->view('common/header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('common/footer');

	}
}