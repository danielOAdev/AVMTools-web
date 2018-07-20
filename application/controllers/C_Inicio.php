<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inicio extends CI_Controller {

	public function index()
	{
		$this->load->helper('date');
		$this->load->library('calendar');

		$data = array(
			'cale' => $this->calendar->generate(),
			'total_days' => days_in_month(date('n'),date('Y')),
			'dia' => date('j'),
			'mes' => date('n'),
			'ano' => date('Y'),
			'esse'=> $this
		);
		$now = date_create( date('Y-m-d') );
		$begin = $now->modify( '-60 day' ); 
		$end = $now->modify( '+90 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		$days = array();
		foreach($daterange as $date){
			$days[] = $date->format("Ymd");
		}
		$this->load->view('V_Inicio', $data);
	}

	public function SayHey()
	{
		return 'Hey';
	}
}