<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	}


	# page de connexion
	public function index() {
		$this->load->view('connexion');
	}


	# page d'erreur
	public function _404() {
		$this->load->view('404');
	}


	public function dashboard() {
		$data['count_all_assiciation'] = $this->Association->count_all_association();

		#section engagements
		$data['count_all_engagement'] = $this->Engagement->count_all_engagement();
		$data['get_all_engagement_actif'] 		= $this->Engagement->get_all_actif();
		$data['get_all_engagement_inactif'] = $this->Engagement->get_all_inactif();
		$data['get_best_engagement_of_year'] = $this->Engagement->get_best_engagement_of_year();
		$data['all_engagements'] = $this->Engagement->get_all();
		$data['engagements_versements'] = $this->Engagement->engagements_versements();
		$data['simple_engagements_versements'] = $this->Engagement->simple_engagements_versements();
		



		$data['count_all_gestionnaire'] = $this->Gestionnaire->count_all_gestionnaire();

		# section paroisiens
		$data['count_all_paroisiens'] = $this->Paroisien->count_all_paroisiens();
		$data['count_actif_paroisiens'] = $this->Paroisien->count_actif_paroisiens();
		$data['count_inactif_paroisiens'] = $this->Paroisien->count_inactif_paroisiens();
		
		$data['Paroisiens'] = $this->Paroisien->get_all();


		$data['count_all_versement'] = $this->Versement->count_all_versement();


		// var_dump($data);
		$this->load->view('dashboard', $data);
	}

	
}
