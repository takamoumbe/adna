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



	# 3- Inserer un engagement
	public function if_exit_engagement($data) {
		$query =  $this->db
		->select('count(*) as engagementCount')
		->where('engagements.paroisien = '.$data['paroisien'])
		->where("engagements.type = '".$data['type']."'")
		->where('engagements.date_fin >= '.$data['date_debut'])
		->where('engagements.date_fin <= '.$data['date_fin'])
		->get('engagements')->result();
		return $query;
	}

	# 4- selectionner tout les engagement actifs

	


	# 4- Infos de toutes les engagements 
	public function get_all() {
		$query =  $this->db
		->select('engagements.idEngagement, engagements.matriculEngag, engagements.paroisien')
		->select('paroisiens.nom, paroisiens.prenom, engagements.type, engagements.montant, engagements.date_debut, engagements.date_fin')
		->select('associations.nom as nomAssoc, associations.sigle, paroisiens.association, paroisiens.sexe')
		->where('engagements.paroisien = paroisiens.idParois')
		->where('paroisiens.association = associations.idAssocia')
		->order_by("paroisiens.nom", "ASC")
		->order_by("paroisiens.prenom", "ASC")
		->get('engagements, associations, paroisiens')->result();
		return $query;
	}



	# 4- Infos d'un engagement 
	public function get($idEngagement) {
		$query =  $this->db
		->select('engagements.idEngagement, engagements.matriculEngag, engagements.paroisien')
		->select('paroisiens.nom, paroisiens.prenom, engagements.type, engagements.montant, engagements.date_debut, engagements.date_fin')
		->select('associations.nom as nomAssoc, associations.sigle, paroisiens.association, paroisiens.sexe')
		->where('engagements.idEngagement = '.$idEngagement)
		->where('engagements.paroisien = paroisiens.idParois')
		->where('paroisiens.association = associations.idAssocia')
		->order_by("paroisiens.nom", "ASC")
		->order_by("paroisiens.prenom", "ASC")
		->get('engagements, associations, paroisiens')->result();
		return $query;
	}

		
	# 5- Modifier un engagement
	public function update($idEngagement, $data)	{
		$query = $this->db->where('idEngagement',$idEngagement)->update('engagements',$data);
		return $query;
	}


}
?>