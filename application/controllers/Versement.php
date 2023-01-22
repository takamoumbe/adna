<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/versements.php';

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



	# 1- page d'insertion association
	public function index() {
		$data['engagements'] = $this->Engagement->get_all();
		$this->load->view('versements/edit', $data);
	}



	# 2- Insertion d'une association
	public function store() {
		$this->form_validation->set_rules('engagement', 		'Paroissien Concerné', 	'required');
		$this->form_validation->set_rules('date_versement', 	'Date de Versement', 	'required');
		$this->form_validation->set_rules('evenement', 			'Evènement', 	'required');
		$this->form_validation->set_rules('montant', 			'Montant Versement', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', versementLost());
			$this->index();
		}
		else {
			$count = $this->Versement->count_versement();
			$matricule = date('md-').lastInsert($count[0]->totalVersements +1).date('-Y');

			$data = array(
				'matriculeVers'		=>	$matricule,
				'engagement'		=>	$this->input->post('engagement'),
				'date_versement'	=>	$this->input->post('date_versement'),
				'evenement'			=>	$this->input->post('evenement'),
				'montant'			=>	$this->input->post('montant'),
				'saveAt'			=>	date('d-m-Y h:i:s'),
				'saveBy'			=>	'',
			);

			var_dump($data);

			if ($this->Versement->store($data)) {
				$this->session->set_flashdata('message', versementLost());
				$this->index();
			} 
			else {
				$this->session->set_flashdata('message', versementWin());
				redirect(base_url("versements"));
			}
		}
	}



	# 3- Infos des versements
	public function get_all() {
		$data['versements'] = $this->Versement->get_all();
		$this->load->view('versements/list', $data);
	}



	# 4- Infos d'un versement
	public function get($idVers) {
		$data['versements'] = $this->Versement->get($idVers);
		$this->load->view('versements/update', $data);
	}



	# 5- modifier un versement
	public function update() {
		$this->form_validation->set_rules('montant', 			'Montant Versement', 	'required');
		$this->form_validation->set_rules('evenement', 			'Evènement du versement', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', versementUpdateLost($this->input->post('MatriculeVersement')));
			$this->get($this->input->post('idVers'));
		}
		else {
			$data = array(
				'montant'			=>	$this->input->post('montant'),
				'evenement'			=>	$this->input->post('evenement'),
				'updateAt'			=>	date('d-m-Y h:i:s'),
				'saveBy'			=>	'',
			);

			if ($this->Versement->update($this->input->post('idVers'), $data)) {
				$this->session->set_flashdata('message', versementUpdateWin($this->input->post('MatriculeVersement')));
				redirect(base_url("versementListe"));
			} 
			else {
				$this->session->set_flashdata('message', versementUpdateLost($this->input->post('MatriculeVersement')));
				$this->get($this->input->post('idVers'));
			}
		}
	}



	

}
