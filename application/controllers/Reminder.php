<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//$this->load->library('input');
		$this->load->library('email');
		$this->load->model('reminder_model');
	}


	public function index(){

		echo $this->notification();
		///var_dump($this->reminder_model->getReminder());

	}

	private function notification(){
		$current_date = new DateTime("now");
		$interval   ='';

		$end_dates =  $this->reminder_model->getReminder();

		if(!empty($end_dates)){
				foreach ($end_dates as $end_date) {
				
						$enddate = new DateTime($end_date->end_date);
						$interval1 = $current_date->diff($enddate);//format('%d day ago');
						if(($interval1->format('%d') >= 0 && $interval1->format('%d') <= 9) && $interval1->format('%m') ==0){
							//$interval.='Yes</br>';
							var_dump(($this->reminder_model->getEmail()));
							if(!empty($this->reminder_model->getEmail())){
								$this->email->from('contracts@powertel.co.zw');
								$this->email->to('dshumba@powertel.co.zw');
								$this->email->subject($end_date->organisation_name." contract expiring on ".$end_date->end_date);
								$this->email->message($end_date->organisation_name." contract expiring in ". $interval1->format('%d day\'s time.'));
								$this->email->send();
								echo 'Sent';
							}
						}
				
				}
		}

		return $interval;

		
	}
}