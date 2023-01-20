<?php 

class EngagementModel extends CI_Model {

	/* constructeur */
	public function __construct() {
		$this->load->database();
		$this->load->helper('url');
	}


	# 1- compter les engagements
	public function count_engagements() {
		$query =  $this->db
		->select('count(*) as totalEngagements')
		->get('engagements')->result();
		return $query;
	}



	# 2- Inserer un engagement
	public function store($data) {
		$this->db->insert('engagements', $data);
	}



	# 2- Inserer un engagement
	public function if_exit_engagement($data) {
		$query =  $this->db
		->select('count(*) as engagementCount')
		->where('engagements.paroisien = '.$data['paroisien'])
		->where('engagements.type = '.$data['type'])
		->where('engagements.date_fin >= '.$data['date_debut'])
		->where('engagements.date_fin <= '.$data['date_fin'])
		->get('engagements')->result();
		return $query;
	}


}
?>