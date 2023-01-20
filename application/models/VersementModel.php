<?php 

class VersementModel extends CI_Model {



	/* constructeur */
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}



	/* listing données */
	public function get_all() {
		$query =  $this->db
		->select('versemments.idVers, versemments.matriculeVers, versemments.engagement, versemments.matriculeEngag')
		->select('versemments.paroisien, versemments.nomParoisien, versemments.prenomParoisien, versemments.montant as montantVers')
		->select('engagements.montant as montantEng, paroisiens.nomAssociation, paroisiens.sigleAssociation, paroisiens.idParois,  engagements.type, versemments.date_versement, versemments.evenement')
		->where('engagements.matriculEngag = versemments.matriculeEngag and versemments.paroisien = paroisiens.idParois')
		->order_by("versemments.nomParoisien", "ASC")
		->order_by("versemments.prenomParoisien", "ASC")
		->order_by("versemments.montant", "DESC")
		->get('versemments, engagements, paroisiens')->result();
		return $query;
	}



	/* listing données actif */
	public function get_all_actif() {
		$query['actif'] 	= $this->db->where('statut', 'actif')
		->get('versemments')->result();
		return $query;
	}



	/* listing données inactif */
	public function get_all_inactif() {
		$query['inactif'] 	= $this->db->where('statut', 'inactif')
		->get('versemments')->result();
		return $query;
	}



	/* listing versement paroisien */
	public function get_versement_paroisien($paroisien) {
		$query['engagement'] = $this->db->where('paroisien', $paroisien)
		->get('versemments')
		->order_by("saveAt", "DESC")
		->group_by('type',  'ASC')
		->result();

		$query['total'] = $this->db->where('paroisien', $paroisien)
		->get('versemments')
		->group_by('type')
		->count_all_results();
		return $query;
	}



	/* classement versement paroisien */
	public function get_classement_versement_paroisien($start_date, $end_date) {
		$query = $this->db->select('paroisien, nomParoisien, prenomParoisien, sum(montant)')
		->where('date_versement BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"')
		->group_by('paroisien')
		->order_by("montant", "ASC")
		->order_by("nomParoisien", "ASC")
		->order_by("prenomParoisien", "ASC")
		->result();
		return $query;
	}



	/* paroisien ayant encore des dettes */
	public function get_paroisien_en_dettes() {
		$query = $this->db->select('
			versemments.matriculeVers,
			versemments.engagement,
			versemments.nomParoisien,
			versemments.prenomParoisien,
			engagements.idEngagement,
			engagements.matriculEngag,
			engagements.montant,
			sum(versemments.montant) as montantVersement')
			->from('versemments', 'engagements')
			->join('engagements', 'versemments.engagement = engagements.idEngagement')
			->where('montantVersement <', 'engagements.montant')
		->result();
		return $query;
	}



	/* paroisien ayant encore des dettes */
	public function get_paroisien_en_dettes_durant_annee_en_cour() {
		$query = $this->db->select('
			versemments.matriculeVers,
			versemments.engagement,
			versemments.nomParoisien,
			versemments.prenomParoisien,
			engagements.idEngagement,
			engagements.matriculEngag,
			engagements.montant,
			sum(versemments.montant) as montantVersement')
			->from('versemments', 'engagements')
			->join('engagements', 'versemments.engagement = engagements.idEngagement')
			->where('montantVersement <', 'engagements.montant')
			->where('engagements.date_fin BETWEEN "'
				. date('Y-m-d', strtotime(date('Y').'-01-01'))
				. '" and "'. date('Y-m-d', strtotime(date('Y').'-12-31'))
				.'"'
			)
			->result();
		return $query;
	}



	/* paroisien ayant encore des dettes */
	public function get_paroisien_sans_dettes_durant_annee_en_cour() {
		$query = $this->db->select('
			versemments.matriculeVers,
			versemments.engagement,
			versemments.nomParoisien,
			versemments.prenomParoisien,
			engagements.idEngagement,
			engagements.matriculEngag,
			engagements.montant,
			sum(versemments.montant) as montantVersement')
			->from('versemments', 'engagements')
			->join('engagements', 'versemments.engagement = engagements.idEngagement')
			->where('montantVersement >=', 'engagements.montant')
			->where('engagements.date_fin BETWEEN "'
				. date('Y-m-d', strtotime(date('Y').'-01-01'))
				. '" and "'. date('Y-m-d', strtotime(date('Y').'-12-31'))
				.'"'
			)
			->result();
		return $query;
	}



	/* paroisien ayant encore des dettes */
	public function get_paroisien_sans_dettes() {
		$query = $this->db->select('
			versemments.idVers,
			versemments.matriculeVers,
			versemments.engagement,
			versemments.nomParoisien,
			versemments.prenomParoisien,
			engagements.idEngagement,
			engagements.matriculEngag,
			engagements.montant,
			sum(versemments.montant) as montantVersement')
			->from('versemments', 'engagements')
			->join('engagements', 'versemments.engagement = engagements.idEngagement')
			->where('montantVersement >=', 'engagements.montant')
		->result();
		return $query;
	}



	/* paroisien ayant encore des dettes */
	public function get_if_paroisien_en_dettes($idParois) {
		$query = $this->db->select('
			versemments.idVers,
			versemments.engagement,
			versemments.nomParoisien,
			versemments.prenomParoisien,
			engagements.idEngagement,
			engagements.matriculEngag,
			engagements.montant,
			sum(versemments.montant) as montantVersement')
			->from('versemments', 'engagements')
			->join('engagements', 'versemments.engagement = engagements.idEngagement')
			->where('versemments.paroisien', $idParois)
			->where('montantVersement <=', 'engagements.montant')
		->result();
		return $query;
	}



	/* enregistrement données*/
	public function store($data) {
		$this->db->insert('versemments', $data);
	}



	/* selection unique*/
	public function get($idVers){
		$query = $this->db->get_where('versemments', ['idVers' => $idVers ])->row();
		return $query;
	}



	/* custom search */
	public function custum_getting() {
		$query['matri'] = $this->db->select('matriculEngag')
		->order_by('saveAt', 'DESC')
		->limit(1)
		->get('versemments')
		->result();
		if (!$query['matri']) {
			$query['matri'] = "0001-Z-".date('Y');
		}
		$query['count'] = $this->db->from('versemments')->count_all_results();
		return $query;
	}



	/* count engagement */
	public function count_specious_engagement($paroisien) {
		$date1 = '01-01-'.date('Y');
		$date2 = '31-12-'.date('Y');
		$query['count'] = $this->db->from('versemments')
			->where('paroisien',$paroisien)
			->where('date_fin BETWEEN ' . $date1 . ' AND ' . $date2)
			->count_all_results();
		return $query;
	}



	/* special search */
	public function special_get_all() {
		$query = $this->db->select('paroisien','type','date_debut','date_fin')->get('versemments')->result();
		return $query;
	}



	/* modification données */
	public function update($idVers, $data)	{
		$query = $this->db->where('idVers',$idVers)->update('versemments',$data);
		return $query;
	}



	/* suppression du compte */
	public function delete($idVers, $data){
		$query = $this->db->where('idVers',$idVers)->update('versemments',$data);
		return $query;
	}



	/* restoration du compte */
	public function reload($idVers, $data){
		$query = $this->db->where('idVers',$idVers)->update('versemments',$data);
		return $query;
	}



	/* counting */
	public function custom_count(){
		$query= $this->db->get('versemments')
		->group_by('paroisien')
		->group_by('type')
		->count_all_results();
		return $query;
	}




	/* counting */
	public function count_all_versement(){
		$query = $this->db->from('versemments')->count_all_results();
		return $query;
	}

}
?>