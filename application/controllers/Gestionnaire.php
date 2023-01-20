<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/gestionnaires.php';

class Gestionnaire extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('ParoisienModel', 'Paroisien');
		$this->load->model('GestionnaireModel', 'Gestionnaire');
	}


	# 1- page d'insertion gestionnaire
	public function index() {
		$data['paroissiens'] = $this->Paroisien->get_all();
		$this->load->view('gestionnaires/edit', $data);
	}




	# 2- Insertion d'un gestionnaire
	public function store() {
		$this->form_validation->set_rules('paroisien', 			'Nom du Paroissien concerné', 'required|is_unique[gestionnaire.paroisien]');
		$this->form_validation->set_rules('accreditations', 	'Accréditations du gestionnaire', 	'required');
		$this->form_validation->set_rules('login', 				'Login du gestionnaire', 	'required|is_unique[gestionnaire.login]');
		$this->form_validation->set_rules('password', 			'Password du gestionnaire', 	'required');
		$this->form_validation->set_rules('fonction', 			'Statut occupé dans la paroisse', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$data = $this->Paroisien->get($this->input->post('paroisien'));
			$this->session->set_flashdata('message', insertGestLost($data[0]->nom, $data[0]->prenom));
			$this->index();
		}
		else {
			$data = array(
				'paroisien'			=>	$this->input->post('paroisien'),
				'accreditations'	=>	$this->input->post('accreditations'),
				'login'				=>	md5($this->input->post('login')),
				'password'			=>	md5($this->input->post('password')),
				'fonction'			=>	$this->input->post('fonction'),
				'saveAt'			=>	date('d-m-y h:i:s'),
				'saveBy'			=>	'',
			);
			
			$array = $this->Paroisien->get($data['paroisien']);
			if ($this->Gestionnaire->store($data)) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->session->set_flashdata('message', insertGestLost($array[0]->nom, $array[0]->prenom));
				$this->index();
			} 
			else {
				$this->session->set_flashdata('message', insertGestWin($array[0]->nom, $array[0]->prenom));
				redirect(base_url("gestionnaires"));
			}
		}
	}



	# 3- Infos de toutes les gestionnaires
	public function get_all() {
		$data['gestionnaires'] = $this->Gestionnaire->get_all();
		$this->load->view('gestionnaires/list', $data);
	}



	# 4- Infos d'un gestionnaire
	public function get($idParois) {
		$data['paroissiens'] = $this->Paroisien->get_all();
		$data['gestionnaires'] = $this->Gestionnaire->get($idParois);
		$this->load->view('gestionnaires/update', $data);
	}



	# 5- Modifier un paroissien
	public function update() {
		$this->form_validation->set_rules('paroisien', 			'Nom du Paroissien concerné', 'required');
		$this->form_validation->set_rules('accreditations', 	'Accréditations du paroisien', 	'required');
		$this->form_validation->set_rules('login', 				'Login du paroissien', 	'required');
		$this->form_validation->set_rules('password', 			'Password du paroissien', 	'required');
		$this->form_validation->set_rules('fonction', 			'Statut occupé dans la paroisse', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$data = $this->Paroisien->get($this->input->post('paroisien'));
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateGestLost($data[0]->nom, $data[0]->prenom));
			$this->get($this->input->post('idGest'));
		}
		else {
			$data = array(
				'paroisien'			=>	$this->input->post('paroisien'),
				'accreditations'	=>	$this->input->post('accreditations'),
				'login'				=>	$this->input->post('login'),
				'password'			=>	$this->input->post('password'),
				'fonction'			=>	$this->input->post('fonction'),
				'updateAt'			=>	date('d-m-y h:i:s'),
				'updateBy'			=>	'',
			);
			
			$array = $this->Paroisien->get($this->input->post('paroisien'));
			if ($this->Gestionnaire->update($this->input->post('idGest'), $data) == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->session->set_flashdata('message', updateGestLost($array[0]->nom, $array[0]->prenom));
				$this->get($this->input->post('idParois'));
			} 
			else {
				$this->session->set_flashdata('message', updateGestWin($array[0]->nom, $array[0]->prenom));
				redirect(base_url("gestionnairesListe"));
			}
		}
	}



	# 4- consulter un paroissien
	public function delete($idGest) {
		$this->Gestionnaire->delete($idGest);
		redirect(base_url("gestionnairesListe"));
	}
}
