<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/paroissiens.php';

class Paroisien extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('ParoisienModel', 'Paroisien');
		$this->load->model('AssociationsModel', 'Association');
	}



	# 1- page d'insertion paroisiens
	public function index() {
		$data['associations'] = $this->Association->get_all();
		$this->load->view('paroisiens/edit', $data);
	}




	# 2- Insertion d'un paroisien
	public function store() {
		$this->form_validation->set_rules('association', 	'Nom l\'association',   'required');
		$this->form_validation->set_rules('sexe', 			'Sexe de paroisien', 	'required');
		$this->form_validation->set_rules('categorie', 		'Catégorie paroisien', 	'required');
		$this->form_validation->set_rules('nom', 			'Nom du paroisien', 	'required');
		$this->form_validation->set_rules('date_naiss', 	'Date de naissance', 	'required');
		$this->form_validation->set_rules('adresse', 		'Adresse du paroisien', 'required');
		$this->form_validation->set_rules('date_adhesion', 	"Date d'adhésion", 		'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', insertParoisLost($this->input->post('nom'), $this->input->post('prenom')));
			$this->index();
		}

		else {
			$value 	= $this->Paroisien->counting_all();
			$matri 	= $this->Paroisien->getLastMatricule();
			$letter = explode("-", $matri);
			$matricule = lastInsert($value+1)."-".nextCaracter($letter[1])."-".extractYear($this->input->post('date_naiss'));
			$data = array(
				'matriculeParois'	=>	strtoupper($matricule),
				'association'		=>	$this->input->post('association'),
				'ancienMatricule'	=>	$this->input->post('ancienMatricule'),
				'categorie'			=>	$this->input->post('categorie'),
				'nom'				=>	$this->input->post('nom'),
				'prenom'			=>	$this->input->post('prenom'),
				'date_naiss'		=>	$this->input->post('date_naiss'),
				'lieu_naiss'		=>	$this->input->post('lieu_naiss'),
				'sexe'				=>	$this->input->post('sexe'),
				'telephone1'		=>	$this->input->post('telephone1'),
				'telephone2'		=>	$this->input->post('telephone2'),
				'email'				=>	$this->input->post('email'),
				'adresse'			=>	$this->input->post('adresse'),
				'date_adhesion'		=>	date('Y', strtotime($this->input->post('date_adhesion'))),
				'statut'			=>	'actif',
				'saveAt'			=>	date('d-m-y h:i:s'),
				'saveBy'			=>	'',
			);
			
			if ($this->Paroisien->store($data)) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->session->set_flashdata('message', insertParoisLost($data['nom'], $data['prenom']));
				$this->index();
			} 
			else {
				$this->session->set_flashdata('message', insertParoisWin($data['nom'], $data['prenom']));
				redirect(base_url("paroisiens"));
			}
		}
	}



	# 3- Infos de toutes les paroissiens
	public function get_all() {
		$data['paroissiens'] = $this->Paroisien->get_all();
		$this->load->view('paroisiens/list', $data);
	}



	# 4- Infos d'un paroissien
	public function get($idParois) {
		$data['paroissiens'] = $this->Paroisien->get($idParois);
		$data['associations'] = $this->Association->get_all();
		$this->load->view('paroisiens/update', $data);
	}



	# 5- Modifier un paroissien
	public function update() {
		$this->form_validation->set_rules('association', 	'Nom l\'association', 'required');
		$this->form_validation->set_rules('sexe', 			'Sexe de paroisien', 	'required');
		$this->form_validation->set_rules('categorie', 		'Catégorie paroisien', 	'required');
		$this->form_validation->set_rules('nom', 			'Nom du paroisien', 	'required');
		$this->form_validation->set_rules('date_naiss', 	'Date de naissance', 	'required');
		$this->form_validation->set_rules('adresse', 		'Adresse du paroisien', 'required');
		$this->form_validation->set_rules('date_adhesion', 	"Date d'adhésion", 		'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateParoisLost($this->input->post('nom'), $this->input->post('prenom')));
			$this->get($this->input->post('idParois'));
		}
		else {
			$data = array(
				'association'		=>	$this->input->post('association'),
				'ancienMatricule'	=>	$this->input->post('ancienMatricule'),
				'categorie'			=>	$this->input->post('categorie'),
				'nom'				=>	$this->input->post('nom'),
				'prenom'			=>	$this->input->post('prenom'),
				'date_naiss'		=>	$this->input->post('date_naiss'),
				'lieu_naiss'		=>	$this->input->post('lieu_naiss'),
				'sexe'				=>	$this->input->post('sexe'),
				'telephone1'		=>	$this->input->post('telephone1'),
				'telephone2'		=>	$this->input->post('telephone2'),
				'email'				=>	$this->input->post('email'),
				'adresse'			=>	$this->input->post('adresse'),
				'date_adhesion'		=>	date('Y', strtotime($this->input->post('date_adhesion'))),
				'statut'			=>	'actif',
				'saveAt'			=>	date('d-m-y h:i:s'),
				'saveBy'			=>	'',
			);

			if ($this->Paroisien->update($this->input->post('idParois'), $data) == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				$this->session->set_flashdata('message', updateParoisLost($data['nom'], $data['prenom']));
				$this->get($this->input->post('idParois'));
			} 
			else {
				$this->session->set_flashdata('message', updateParoisWin($data['nom'], $data['prenom']));
				redirect(base_url("paroisienListe"));
			}
		}
	}



	# 4- consulter un paroissien
	public function view($idParois) {
		$data['paroissiens'] = $this->Paroisien->get($idParois);
		$data['associations'] = $this->Association->get_all();
		$this->load->view('paroisiens/consult', $data);
	}



	# 4- consulter un paroissien
	public function delete($idParois) {
		$this->Paroisien->delete($idParois);
		redirect(base_url("paroisienListe"));
	}



	# 4- consulter un paroissien
	public function reload($idParois) {
		$this->Paroisien->reload($idParois);
		redirect(base_url("paroisienListe"));
	}

}
