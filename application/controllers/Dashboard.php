<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'functions/dashboard.php';

class Dashboard extends CI_Controller {


	// contructeur
	public function __construct() {
		parent::__construct(); 
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('associationsModel', 'Association');
		$this->load->model('EngagementModel', 'Engagement');
		$this->load->model('GestionnaireModel', 'Gestionnaire');
		$this->load->model('ParoisienModel', 'Paroisien');
		$this->load->model('VersementModel', 'Versement');
		$this->load->model('StatistiquesModel', 'Stat');
	}


	# 1- page de connexion
	public function index() {
		$this->load->view('connexion');
	}


	# 1- page de connexion
	public function exit() {
		$this->session->sess_destroy();
		redirect(base_url('On'));
	}


	# 2- page 404
	public function _404() {
		$this->load->view('404');
	}


	# 2- page d'acceuil
	public function dashboard() {
		$data['allAssociations'] = $this->Stat->count_association();
		$data['allParoissiens'] = $this->Stat->count_paroissiens();
		$data['allEngagement'] = $this->Stat->count_engagement();
		$data['allVersement'] = $this->Stat->count_versement();
		$data['paroiAssocia'] = $this->Stat->paroissienParAssociation();
		$data['paroiSexe'] = $this->Stat->paroissienParSexe();
		$data['paroiCateg'] = $this->Stat->paroissienParCategorie();
		$data['allGest'] = $this->Stat->counting_all_gestionnaire();
		$this->load->view('dashboard' , $data);
	}


	# 2- page 404
	public function connexion() {
		$this->form_validation->set_rules('login', 'Login', 	'required');
		$this->form_validation->set_rules('password', 'Password', 	'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('message', loginLost());
			$this->index();
		}
		else {
			$query = $this->Gestionnaire->loginCount(md5($this->input->post('login')), md5($this->input->post('password')));
			if ($query[0]->nombreGestionnaire != 1) {
				$this->session->set_flashdata('message', loginLost());
				$this->index();
			}
			else{
				$query = $this->Gestionnaire->loginData(md5($this->input->post('login')), md5($this->input->post('password')));
				if (!$query[0]) {
					$this->session->set_flashdata('message', loginLost());
					$this->index();
				} 
				else {
					$data = $query[0];
					$this->load->library('session');
					$_SESSION['nom'] = $data->nom;
					$_SESSION['prenom'] = $data->prenom;
					$_SESSION['fonction'] = $data->fonction;
					$_SESSION['accreditations'] = $data->accreditations;
					$_SESSION['idGest'] = $data->idGest;
					$_SESSION['login'] = $data->login;
					$_SESSION['password'] = $data->password;
					$_SESSION['sigle'] = $data->sigle;
					$_SESSION['nomAssociation'] = $data->nomAssociation;
					$this->session->set_userdata($query[0]);
					$this->session->set_flashdata('message', loginWin());
					redirect(base_url("Home"));
				}
			}
		}
	}


	
}
