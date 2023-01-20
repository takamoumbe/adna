<?php 
class GestionnaireModel extends CI_Model {

	/* constructeur */
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}



	# 1- Inserer un paroisien
	public function store($data) {
		$this->db->insert('gestionnaire', $data);
	}



	# 2- Infos de toutes les paroissiens 
	public function get_all() {
		$query =  $this->db
		->select('gestionnaire.idGest, gestionnaire.paroisien, gestionnaire.accreditations, gestionnaire.fonction')
		->select('paroisiens.nom, paroisiens.prenom, paroisiens.sexe, paroisiens.categorie, paroisiens.association')
		->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
		->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
		->where('gestionnaire.paroisien =  paroisiens.idParois')
		->where('paroisiens.association =  associations.idAssocia')
		->order_by("paroisiens.nom", "ASC")
		->order_by("gestionnaire.fonction", "ASC")
		->get('gestionnaire, paroisiens, associations')->result();
		return $query;
	}



	# 3- Infos d'un gestionnaire
	public function get($idGest) {
		$query =  $this->db
		->select('gestionnaire.idGest, gestionnaire.paroisien, gestionnaire.login, gestionnaire.accreditations, gestionnaire.fonction')
		->select('gestionnaire.password, paroisiens.nom, paroisiens.prenom, paroisiens.sexe, paroisiens.categorie, paroisiens.association')
		->select('paroisiens.telephone1, paroisiens.adresse, paroisiens.email, paroisiens.date_adhesion')
		->select('associations.nom as nomAssociation, associations.sigle as sigleAssociation')
		->where('gestionnaire.idGest = '.$idGest)
		->where('gestionnaire.paroisien =  paroisiens.idParois')
		->where('paroisiens.association =  associations.idAssocia')
		->get('gestionnaire, paroisiens, associations')->result();
		return $query;
	}



	# 4- Modifier un paroissien
	public function update($idGest, $data)	{
		$query = $this->db->where('idGest',$idGest)->update('gestionnaire',$data);
		return $query;
	}



	# 5- supprimer un gestionnaire
	public function delete($idGest)	{
		$query = $this->db->where('idGest', $idGest)->delete('gestionnaire');
		return $query;
	}


}
?>