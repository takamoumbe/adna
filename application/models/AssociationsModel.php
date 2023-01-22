<?php 
	class AssociationsModel extends CI_Model {

		/* constructeur */
		public function __construct() {
			$this->load->database();
			$this->load->helper('url');
		}

		
		# 1- Inserer une association
		public function store($data) {
			$this->db->insert('associations', $data);
		}

		
		# 2- Infos de toutes les associations
		public function get_all() {
			$query =  $this->db
			->select('associations.idAssocia, associations.nom, associations.sigle ')
			->order_by("associations.nom", "ASC")
			->get('associations')->result();
			return $query;
		}

		# 1- count all associations
		public function count_all_association(){
			$query = $this->db->from('associations')->count_all_results();
			return $query;
		}


		
		# 3- Infos d'une association
		public function get($idAssocia) {
			$query =  $this->db
			->select('associations.idAssocia, associations.nom, associations.sigle ')
			->where('associations.idAssocia = '.$idAssocia)
			->order_by("associations.nom", "ASC")
			->get('associations')->row();
			return $query;
		}

		
		# 4- Modifier une association
		public function update($idAssocia, $data)	{
			$query = $this->db->where('idAssocia',$idAssocia)->update('associations',$data);
			return $query;
		}

		
		# 5- compter les associations
		public function counting_all()	{
			$query = $this->db->count_all('associations');
			return $query;
		}

	}
?>