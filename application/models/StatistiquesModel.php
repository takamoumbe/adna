<?php 
	class StatistiquesModel extends CI_Model {


		/* constructeur */
		public function __construct() {
			$this->load->database();
			$this->load->helper('url');
		}


		# 2- count all paroissiens
		public function count_all_paroissiens(){
			$query = $this->db->from('paroisiens')->count_all_results();
			return $query;
		}

		# 1- Total des associations
		public function count_association(){
			$query =  $this->db
			->select('count(*) as totalAssociation')
			->get('associations')->result();
			return $query;
		}


		# 2- Total des egagements
		public function count_paroissiens(){
			$query =  $this->db
			->select('count(*) as totalParoissiens')
			->get('paroisiens')->result();
			return $query;
		}


		# 3- Total des egagements
		public function count_engagement(){
			$query =  $this->db
			->select('count(*) as totalEngagements')
			->get('engagements')->result();
			return $query;
		}


		# 4- Total des versements
		public function count_versement(){
			$query =  $this->db
			->select('count(*) as totalVersement')
			->get('versements')->result();
			return $query;
		}


		# 5- Total des paroissiens par association
		public function paroissienParAssociation(){
			$query =  $this->db
			->select('associations.sigle, count(paroisiens.idParois) as totalParoissiens')
			->where('associations.idAssocia = paroisiens.association')
			->group_by("associations.sigle", "ASC")
			->get('associations, paroisiens')->result();
			return $query;
		}


		# 3- Total des paroissiens par sexe
		public function paroissienParSexe(){
			$query =  $this->db
			->select('sexe, count(*) as totalParoissiens')
			->group_by("paroisiens.sexe", "ASC")
			->get('paroisiens')->result();
			return $query;
		}


		# 3- Total des paroissiens par catégorie
		public function paroissienParCategorie(){
			$query =  $this->db
			->select('paroisiens.categorie, count(*) as paroissienCategorie')
			->group_by('paroisiens.categorie',  'ASC')
			->get('paroisiens')->result();
			return $query;
		}

		
		# 5- compter les associations
		public function counting_all_gestionnaire()	{
			$query = $this->db->count_all('gestionnaire');
			return $query;
		}
	}
?>
