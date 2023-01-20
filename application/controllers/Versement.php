<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/functions.php';

class Versement extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('VersementModel', 'Versement');
		$this->load->model('EngagementModel', 'Engagement');
	}


	/* page de creation */
	public function index() {
		$data['engagements'] = $this->Engagement->get_all_actif();
		$this->load->view('versements/edit', $data);
	}


	/* page de listing */
	public function get_all() {
		$data['versements'] = $this->Versement->get_all();
		$this->load->view('versements/list', $data);
	}



	/* page de listing */
	public function get_versement_paroisien($paroisien) {
		$data['versements'] = $this->Versement->get_versement_paroisien($paroisien);
		$this->load->view('versements/versement', $data);
	}



	/* enregistrement */
	public function store() {
		$this->form_validation->set_rules('engagement', 		'Reférence de l\'engagement', 	'required');
		$this->form_validation->set_rules('date_versement', 	'Date de versement', 	'required');
		$this->form_validation->set_rules('evenement', 			'Date début d\'Versement', 	'required');
		$this->form_validation->set_rules('montant', 			'Montant du versement', 	'required|integer');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', insertLost());
			redirect(base_url("versements"));
		}

		else {
			$value 	= $this->Versement->custum_getting();
			$letter = explode("-", $value['matri']);
			$matricule = lastInsert($value['count']+1)."-"
			.nextCaracter($letter[1])."-"
			.date('Y');

			$engagements = $this->Engagement->get($this->input->post('engagement'));

			$data = array(
				'matriculeVers'		=>	strtoupper("Vers-".$matricule),
				'engagement'		=>	$this->input->post('engagement'),
				'matriculeEngag'	=>	$engagements->matriculEngag,
				'paroisien'			=>	$engagements->paroisien,
				'nomParoisien'		=>	$engagements->nomParoisien,
				'prenomParoisien'	=>	$engagements->prenomParoisien,
				'date_versement'	=>	$this->input->post('date_versement'),
				'evenement'			=>	$this->input->post('evenement'),
				'montant'			=>	$this->input->post('montant'),
				'saveAt'			=>	date('d-m-Y h:i:s'),
				'saveBy'			=>	'',
			);

			$result = $this->Versement->store($data);

			if (!$result == FALSE) {
				$this->session->set_flashdata('message', insertLost());
			} 
			else {
				$this->session->set_flashdata('message', insertWin());
			}
			redirect(base_url('versements'));
		}
	}


	/* debut de modification*/
	public function get($idVers) {
		$data['versements'] = $this->Versement->get($idVers);
		$data['engagements'] = $this->Engagement->get_all_actif();
		$this->load->view('versements/update', $data);
	}


	/* modification données */
	public function update() {
		$this->form_validation->set_rules('engagement', 		'Matricule d\'engagement', 	'required');
		$this->form_validation->set_rules('paroisien', 			'Nom du paroisien', 	'required');
		$this->form_validation->set_rules('date_versement', 	'Date de versement', 	'required');
		$this->form_validation->set_rules('evenement', 			'Date début d\'Versement', 	'required');
		$this->form_validation->set_rules('montant', 			'Montant du versement', 	'required|integer');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateLost());
			redirect(base_url('versementListe/'.$this->input->post('idVers')));
		}

		else {

			$engagements = $this->Engagement->get($this->input->post('engagement'));
			$data = array(
				'engagement'		=>	$this->input->post('engagement'),
				'matriculeEngag'	=>	$engagements->matriculEngag,
				'paroisien'			=>	$engagements->paroisien,
				'nomParoisien'		=>	$engagements->nomParoisien,
				'prenomParoisien'	=>	$engagements->prenomParoisien,
				'date_versement'	=>	$this->input->post('date_versement'),
				'evenement'			=>	$this->input->post('evenement'),
				'montant'			=>	$this->input->post('montant'),
				'updateAt'			=>	date('d-m-Y h:i:s'),
				'updateBy'			=>	'',
			);

			$result = $this->Versement->update($this->input->post('idVers'), $data);
			if ($result == FALSE) {
				$this->session->set_flashdata('message', updateLost());
			} 
			else {
				$this->session->set_flashdata('message', updateWin());
			}
			redirect(base_url('versementListe'));
		}
	}

}
