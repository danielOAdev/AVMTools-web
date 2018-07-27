<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inicio extends CI_Controller {

	public function index()
	{
		$this->load->helper('date');
		$this->load->library('calendar');

		$now = date_create( date('Y-m-d') );
		$begin = $now->modify( '-1 month' ); 
		$now = date_create( date('Y-m-d') );
		$end = $now->modify( '+3 month' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		
		$data = array(
			'cale' => $this->calendar->generate(),
			'total_days' => days_in_month(date('n'),date('Y')),
			'dia' => date('j'),
			'mes' => date('n'),
			'ano' => date('Y'),
			'esse'=> $this,
			'daterange' => $daterange,
			'db_test' => $this->db->get('new_table')->row_array()['idnew_table']
		);
		
		$this->load->view('V_Inicio', $data);
	}

	public function SayHey()
	{
		return 'Hey';
	}
}