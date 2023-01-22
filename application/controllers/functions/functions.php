<?php  
	
	function extractYear($year) {
		$data = date('y', strtotime($year));
		return $data;
	}

	function nextCaracter($letter){
		$data = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
		$key = array_search(strtolower($letter), $data);
		if ($key == 25) {
			return $data[0];
		} else {
			return $data[($key+1)];
		}
	}	

	function lastInsert($value) {
		$length = strlen($value);
		if ($length == 1) {
			$result = "000".$value;
		}
		elseif ($length == 2) {
			$result = "00".$value;
		}
		elseif ($length == 3) {
			$result = "0".$value;
		}
		else{
			$result = $value;
		}
		return $result;
	}


	function engagementLost($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Echec',
      						text: 'Désolé mais il semblerait que le paroisien ".strtoupper($nom)." ".strtoupper($prenom)." ait déjà un engagement de ce type encore valide.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function engagemenNumberLimit($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Echec',
      						text: 'Désolé mais, il semblerait que le paroisien ".strtoupper($nom)." ".strtoupper($prenom)." ait déjà atteint le nombre maximal d\'engagements pour cette année.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function insertLost(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Echec',
      						text: 'Erreur survenue durant la sauvegarde des données.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function insertWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'Les données ont été enregistrées avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'D\'accord, merci.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                


	function updateWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'Les données ont été modifées avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'D\'accord, merci.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function privilegeLostGrant(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Echec',
      						text: 'Erreur survenue durant l\'attribution des privilèges à ce gestionnaire.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function privilegeWinGrant(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'Les accréditations du gestionnaire ont été mises à jours avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'D\'accord, merci.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function deleteWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'Votre suppréssion à été réalisée avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}


	function reloadWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'Les donnée de cette entitée ont été restorées avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Oui, je comprend.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}
?>