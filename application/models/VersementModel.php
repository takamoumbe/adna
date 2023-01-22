<?php 

	class VersementModel extends CI_Model {

		/* constructeur */
		public function __construct() {
			$this->load->database();
			$this->load->helper('url');
		}


		# 1- compter les versements
		public function count_versement() {
			$query =  $this->db
			->select('count(*) as totalVersements')
			->get('versements')->result();
			return $query;
		}



		# 2- Inserer un versements
		public function store($data) {
			$this->db->insert('versements', $data);
		}



		# 3- Infos de tous les versements 
		public function get_all() {
			$query =  $this->db
			->select('versements.idVers, versements.matriculeVers, engagements.paroisien, paroisiens.nom, paroisiens.prenom, versements.evenement')
			->select('versements.montant as montantVersement,engagements.montant as montantEngagementInitial, engagements.matriculEngag')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation,  versements.date_versement, engagements.type')
			->where('versements.engagement = engagements.idEngagement')
			->where('engagements.paroisien = paroisiens.idParois')
			->where('paroisiens.association = associations.idAssocia')
			->order_by("paroisiens.nom", "ASC")
			->order_by("versements.date_versement", "DESC")
			->get('versements, engagements, paroisiens, associations')->result();
			return $query;
		}

		

		# 4- Modifier un versement
		public function update($idVers, $data)	{
			$query = $this->db->where('idVers',$idVers)->update('versements',$data);
			return $query;
		}



		# 4- Infos d'un versement 
		public function get($idVers) {
			$query =  $this->db
			->select('versements.idVers, versements.matriculeVers, engagements.paroisien, paroisiens.nom, paroisiens.prenom, versements.evenement')
			->select('versements.montant as montantVersement,engagements.montant as montantEngagementInitial, engagements.matriculEngag')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation,  versements.date_versement, engagements.type')
			->where('versements.engagement = engagements.idEngagement')
			->where('engagements.paroisien = paroisiens.idParois')
			->where('paroisiens.association = associations.idAssocia')
			->where('versements.idVers = '.$idVers)
			->order_by("paroisiens.nom", "ASC")
			->order_by("versements.date_versement", "DESC")
			->get('versements, engagements, paroisiens, associations')->result();
			return $query;
		}

	}
?>