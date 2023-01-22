<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/engagements.php';

class Engagement extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('EngagementModel', 'Engagement');
		$this->load->model('ParoisienModel', 'Paroisien');
	}


	# 1- page d'insertion engagement
	public function index() {
		$data['paroisiens'] = $this->Paroisien->get_all_actif();
		$this->load->view('engagements/edit', $data);
	}


	# 2- Infos des engagements
	public function get_all() {
		$data['Engagements'] = $this->Engagement->get_all();
		$this->load->view('engagements/list', $data);
	}



	# 3- Insertion d'un engagement
	public function store() {
		$this->form_validation->set_rules('paroisien', 		'Nom du paroisien', 	'required');
		$this->form_validation->set_rules('type', 			'Type d\'engagement', 	'required');
		$this->form_validation->set_rules('date_debut', 	'Date début d\'engagement', 	'required');
		$this->form_validation->set_rules('montant', 		'Montant de l\'engagement', 	'required|integer');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->index();
		}
		else {

			$count = $this->Engagement->count_engagements();
			$array = $this->Paroisien->get($this->input->post('paroisien'));
			$matricule = date('dm-').lastInsert($count[0]->totalEngagements +1).date('-Y');
			$date_debut = $this->input->post('date_debut');
			$date_fin 	= date('Y-m-d', strtotime($this->input->post('date_debut'). ' + 1 year'));
			$date_end 	= date('Y-').'09-30';

			$info = array(
				'paroisien' 	=> $this->input->post('paroisien'), 
				'type' 			=> $this->input->post('type'), 
				'date_debut' 	=> $this->input->post('date_debut'), 
				'date_fin' 		=> $date_end 
			);
			$Exist = $this->Engagement->if_exit_engagement($info);

			var_export($Exist[0]->engagementCount);

			if ($Exist[0]->engagementCount != 0) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->session->set_flashdata('message', engagementExist($array[0]->nom, $array[0]->prenom));
				redirect(base_url("engagements"));
			} 
			else {
				if ($date_fin > $date_end) {
					$date_fin = $date_end;
				}
				$data = array(
					'matriculEngag'		=>	$matricule,
					'paroisien'			=>	$this->input->post('paroisien'),
					'type'				=>	$this->input->post('type'),
					'date_debut'		=>	$this->input->post('date_debut'),
					'date_fin'			=>	$date_end	,
					'montant'			=>	$this->input->post('montant'),
					'statut'			=>	'actif',
					'saveAt'			=>	date('d-m-Y h:i:s'),
					'saveBy'			=>	'',
				);

				if ($this->Engagement->store($data)) {
					$this->session->set_flashdata('errors', validation_errors());
					$this->session->set_flashdata('message', insertEngagtLost($array[0]->nom, $array[0]->prenom));
					$this->index();
				} 
				else {
					$this->session->set_flashdata('message', insertEngagtWin($array[0]->nom, $array[0]->prenom));
					redirect(base_url("engagements"));
				}
			}
		}
	}



	# 4- Infos d'un engagement
	public function get($idEngagement) {
		$data['engagements'] = $this->Engagement->get($idEngagement);
		$this->load->view('engagements/update', $data);
	}



	public function getting($idEngagement) {
		$data = $this->Engagement->get($idEngagement);
		return $data;
	}



	# 5- Modifier un engagement
	public function update() {
		$this->form_validation->set_rules('montant', 			'Montant de l\'engagement', 'required|integer');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateEngagLost($this->input->post('nom'), $this->input->post('type')));
			$this->get($this->input->post('idEngagement'));
		}
		else {
			$data = array(
				'montant'			=>	$this->input->post('montant'),
				'updateAt'			=>	date('d-m-y h:i:s'),
				'updateBy'			=>	'',
			);
			
			if ($this->Engagement->update($this->input->post('idEngagement'), $data) == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateEngagLost($this->input->post('nom'), $this->input->post('type')));
				$this->get($this->input->post('idParois'));
			} 
			else {
			$this->session->set_flashdata('message', updateEngagWin($this->input->post('nom'), $this->input->post('type')));
				redirect(base_url("engagementListe"));
			}
		}
	}


}
