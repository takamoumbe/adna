<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/associations.php';

class Associations extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('associationsModel', 'Association');
	}

	
	# 1- page d'insertion association
	public function index() {
		$this->load->view('associations/edit');
	}



	# 2- Insertion d'une association
	public function store() {
		$this->form_validation->set_rules('nom', 'Nom de l\'association', 	'required|is_unique[associations.nom]');
		$this->form_validation->set_rules('sigle', 'Sigle de l\'association', 	'required|is_unique[associations.sigle]');

		$nom 	= $this->input->post('nom');
		$sigle 	= $this->input->post('sigle');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', insertAssociaLost($nom, $sigle));
			$this->index();
		}
		else {
			$data = array(
				'nom'				=>	$this->input->post('nom'),
				'sigle'				=>	$this->input->post('sigle'),
				'saveAt'			=>	date('d-m-Y h:i:s'),
				'saveBy'			=>	'',
			);

			if ($this->Association->counting_all() <= 11) {
				if ($this->Association->store($data)) {
					$this->session->set_flashdata('message', insertAssociaLost($nom, $sigle));
				} 
				else {
					$this->session->set_flashdata('message', insertAssociaWin($nom, $sigle));
					redirect(base_url("associations"));
				}
			} 
			else {
				$this->session->set_flashdata('message', inserAssociaOverLimit($nom, $sigle));
			}
			$this->index();
		}
	}



	# 3- Infos des associations
	public function get_all() {
		$data['associations'] = $this->Association->get_all();
		$this->load->view('associations/list', $data);
	}



	# 4- Infos d'une association
	public function get($idAssocia) {
		$data['associations'] = $this->Association->get($idAssocia);
		$this->load->view('associations/update', $data);
	}



	# 5- Modifier une association
	public function update() {
		$this->form_validation->set_rules('nom', 'Nom de l\'association', 	'required');
		$this->form_validation->set_rules('sigle', 'Sigle de l\'association', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', updateLost());
			$this->get($this->input->post('idAssocia'));
		}
		else {
			$data = array(
				'nom'				=>	$this->input->post('nom'),
				'sigle'				=>	$this->input->post('sigle'),
				'updateAt'			=>	date('d-m-Y h:i:s'),
				'updateBy'			=>	'',
			);

			if ($this->Association->update($this->input->post('idAssocia'), $data)) {
				$this->session->set_flashdata('message', updateAssociaWin($data['nom']));
				redirect(base_url("associationsListe"));
			} 
			else {
				$this->session->set_flashdata('message', updateAssociaLost($data['nom']));
				$this->get($this->input->post('idAssocia'));
			}
		}
	}

}
