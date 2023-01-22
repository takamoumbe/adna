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


		# 3- compte paroissiens par associations
		public function count_all_paroissiens_par_associations(){
			$query =  $this->db
			->select('associations.sigle, count(*) as  totalParoissiens')
			->where('paroisiens.association = associations.idAssocia')
			->group_by('associations.sigle',  'ASC')
			->get('associations, paroisiens')->result();
			return $query;
		}


		# 4- compte paroissiens par catégorie
		public function count_paroissien_by_categorie(){
			$query =  $this->db
			->select('paroisiens.categorie, count(*) as paroissienCategorie')
			->group_by('paroisiens.categorie',  'ASC')
			->get('paroisiens')->result();
			return $query;
		}


		# 5- compte paroissiens par sexe
		public function count_paroissien_by_sexe(){
			$query =  $this->db
			->select('paroisiens.sexe, count(*) as paroissienSexe')
			->group_by('paroisiens.sexe',  'ASC')
			->get('paroisiens')->result();
			return $query;
		}


		# 6- compte paroissiens par sexe
		public function count_paroissien_by_adresse(){
			$query =  $this->db
			->select('paroisiens.adresse, count(*) as paroissienAdresse')
			->group_by('paroisiens.adresse',  'ASC')
			->get('paroisiens')->result();
			return $query;
		}


		
		# 7- count all gestionnaire
		public function count_all_gestionnaire(){
			$query = $this->db->from('gestionnaire')->count_all_results();
			return $query;
		}


		
	}
?>
