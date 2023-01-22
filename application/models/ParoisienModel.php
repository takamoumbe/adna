<?php 
	class ParoisienModel extends CI_Model {


		/* constructeur */
		public function __construct() {
			$this->load->database();
			$this->load->helper('url');
		}



		# 1- compter les paroisiens
		public function counting_all()	{
			$query = $this->db->from('paroisiens')->count_all_results();
			return $query;
		}



		# 1- Décompte en fonction du nom & prénom
		public function countByUserData($nom, $prenom)	{
			$query = $this->db
			->from('associations')
			->where('paroisiens.nom = '.$nom)
			->where('paroisiens.prennom = '.$prenom)
			->count_all_results();
			return $query;
		}



		# 2- dernier matricule paroissial
		public function getLastMatricule()	{
			$query = $this->db
			->select('paroisiens.matriculeParois')
			->get('paroisiens', 1)->result();
			if (!$query) {$query = "0-Z-4";}
			return $query;
		}



		# 3- Inserer un paroisien
		public function store($data) {
			$this->db->insert('paroisiens', $data);
		}



		# 4- Infos de toutes les paroissiens 
		public function get_all() {
			$query =  $this->db
			->select('paroisiens.idParois, paroisiens.association, paroisiens.ancienMatricule, paroisiens.matriculeParois')
			->select('paroisiens.nom, paroisiens.statut, paroisiens.prenom, paroisiens.date_naiss, paroisiens.lieu_naiss, paroisiens.sexe, paroisiens.categorie')
			->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
			->where('paroisiens.association =  associations.idAssocia')
			->order_by("paroisiens.nom", "ASC")
			->order_by("paroisiens.date_adhesion", "DESC")
			->get('paroisiens, associations')->result();
			return $query;
		}



		# 4- Infos de toutes les paroissiens actif
		public function get_all_actif() {
			$query =  $this->db
			->select('paroisiens.idParois, paroisiens.association, paroisiens.ancienMatricule, paroisiens.matriculeParois')
			->select('paroisiens.nom, paroisiens.statut, paroisiens.prenom, paroisiens.date_naiss, paroisiens.lieu_naiss, paroisiens.sexe, paroisiens.categorie')
			->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
			->where('paroisiens.statut =  actif')
			->where('paroisiens.association =  associations.idAssocia')
			->order_by("paroisiens.nom", "ASC")
			->order_by("paroisiens.date_adhesion", "DESC")
			->get('paroisiens, associations')->result();
			return $query;
		}



		# 4- Infos de toutes les paroissiens inactif
		public function get_all_inactif() {
			$query =  $this->db
			->select('paroisiens.idParois, paroisiens.association, paroisiens.ancienMatricule, paroisiens.matriculeParois')
			->select('paroisiens.nom, paroisiens.statut, paroisiens.prenom, paroisiens.date_naiss, paroisiens.lieu_naiss, paroisiens.sexe, paroisiens.categorie')
			->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
			->where('paroisiens.association =  associations.idAssocia')
			->where('paroisiens.statut !=  actif')
			->order_by("paroisiens.nom", "ASC")
			->order_by("paroisiens.date_adhesion", "DESC")
			->get('paroisiens, associations')->result();
			return $query;
		}



		# 5- Infos d'un paroissiens 
		public function get($idParois) {
			$query =  $this->db
			->select('paroisiens.idParois, paroisiens.association, paroisiens.ancienMatricule, paroisiens.matriculeParois')
			->select('paroisiens.nom, paroisiens.prenom, paroisiens.date_naiss, paroisiens.lieu_naiss, paroisiens.sexe, paroisiens.categorie')
			->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
			->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
			->where('paroisiens.association =  associations.idAssocia')
			->where('paroisiens.idParois = '.$idParois)
			->get('paroisiens, associations')->result();
			return $query;
		}



		# 4- Modifier un paroissien
		public function update($idParois, $data)	{
			$query = $this->db->where('idParois',$idParois)->update('paroisiens',$data);
			return $query;
		}



		# 5- désactiver un paroissien
		public function delete($idParois)	{
			$data = array('statut' => 'inactif');
			$query = $this->db->where('idParois', $idParois)->update('paroisiens',$data);
			return $query;
		}



		# 6- réactiver un paroissien
		public function reload($idParois)	{
			$data = array('statut' => 'actif');
			$query = $this->db->where('idParois', $idParois)->update('paroisiens',$data);
			return $query;
		}
	}
?>
