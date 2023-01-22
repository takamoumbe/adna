<?php   

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



	function versementLost(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						text: 'Erreur survenue durant l\'enregistrement du versement.',
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


	function versementWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						text: 'L\'enregistrement du versement c\'est réalisé avec succès.',
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



	function versementUpdateLost($matricule){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Erreur survenue durant la modification du versement <b>".$matricule."</b>',
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



	function versementUpdateWin($matricule){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Le versement <b>".$matricule."</b> a bien été modifié',
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