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
		$data['count_all_assiciation'] 		    = $this->Association->count_all_association();

		#section engagements
		$data['count_all_engagement'] 		 	= $this->Engagement->count_engagements();
		$data['get_all_engagement_actif'] 	 	= $this->Engagement->get_all_actif();
		$data['get_all_engagement_inactif']  	= $this->Engagement->get_all_inactif();
		$data['get_best_engagement_of_year'] 	= $this->Engagement->get_best_engagement_of_year();
		$data['all_engagements'] 			 	= $this->Engagement->get_all();
		$data['engagements_versements'] 	 	= $this->Engagement->engagements_versements();
		$data['simple_engagements_versements'] 	= $this->Engagement->simple_engagements_versements();
		



		$data['count_all_gestionnaire'] = $this->Gestionnaire->count_all_gestionnaire();

		# section paroisiens
		$data['count_all_paroisiens'] = $this->Paroisien->count_all_paroisiens();
		$data['count_actif_paroisiens'] = $this->Paroisien->count_actif_paroisiens();
		$data['count_inactif_paroisiens'] = $this->Paroisien->count_inactif_paroisiens();
		
		$data['Paroisiens'] = $this->Paroisien->get_all();


		$data['count_all_versement'] = $this->Versement->count_all_versement();


		// var_dump($data);
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
