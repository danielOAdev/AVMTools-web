<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Calendario extends CI_Controller {

	public function index()
	{
		$this->load->helper('date');
		$this->load->library('calendar');

		$now = date_create( date('Y-m-d') );
		$begin = $now->modify( '-1 month' ); 
		$now = date_create( date('Y-m-d') );
		$end = $now->modify( '+2 year' ); 

		$interval = new DateInterval('P7D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		
		
		$disciplinas = $this->db->select('disciplina.nome, disciplina.qtd_aulas')
		->from('disciplina')
		->join('cursodisciplina', 'disciplina.id = cursodisciplina.id_disciplina')
		->get()
		->result_array();
		
		$data = array(
			'cale' => $this->calendar->generate(),
			'total_days' => days_in_month(date('n'),date('Y')),
			'dia' => date('j'),
			'mes' => date('n'),
			'ano' => date('Y'),
			'esse'=> $this,
			'daterange' => $daterange,
			'db_test' => $this->db->get('curso')->row_array()['id'],
			'disciplinas' => $disciplinas
		);
		
		$this->load->view('V_Calendario', $data);
	}

	public function CalcDates()
	{
		$curso = array_key_exists('curso', $_POST) ? $_POST['curso'] : array();
		$calendario = $_POST['calendario'];
		
		$error = false;
		if(empty($calendario)){
			echo 'Escolha a data de ínicio da turma!<br>';
			$error = true;
		}
		if(empty($curso)){
			echo 'Adicione pelo menos uma disciplina!';
			$error = true;
		}
		if($error) return;

		$tz = new DateTimeZone('America/Sao_Paulo');
		$begin = date_create( $calendario, $tz);
		$end = date_create( $calendario, $tz)->modify( '+2 year' );
		
		$interval = new DateInterval('P1W');	//Intervalo Semanal
		$daterange = new DatePeriod($begin, $interval ,$end);
		
		echo "<table>";
		$col = 0;
		$disc = 1;
		
		foreach($daterange as $date){
			if($col == 0) echo "<tr><td>".$curso[$disc][0]."</td>";
			echo "<td>".$date->format("d/m/Y")."</td>";
			$col++;
			if($col == $curso[$disc][1])
			{
				echo "</tr>";
				$col = 0;
				$disc++;
				if($disc-1 == count($curso))
					break;
			} 
		}
		echo "</table>";
	}
}