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
		$this->load->view('V_Inicio', $data);
	}

	public function SayHey()
	{
		return 'Hey';
	}
}