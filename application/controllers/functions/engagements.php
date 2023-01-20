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



	function insertEngagtLost($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'l\'engagement de <b>".strtoupper($nom)." ".ucfirst($prenom)."</b> n\'a pas pue etre enregistré.',
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



	function engagementExist($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Il semblerait que <b>".strtoupper($nom)." ".ucfirst($prenom)."</b> ait un engagement de ce type encore valide pour cette année.',
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



	function insertEngagtWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'l\'engagement de <b>".strtoupper($nom)." ".ucfirst($prenom)."</b> a bien été enregistré.',
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