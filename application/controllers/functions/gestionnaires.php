<?php  
	
	function isBold($value){
		return "<b>$value</b>";
	}

	function insertGestWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Le gestionnaire ".ucwords(isBold($nom." ".$prenom))." a bien été enregistré.',
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

	function insertGestLost($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Erreurs survenus durant l\'enregistrement du gestionnaire ".ucwords(isBold($nom." ".$prenom)).".',
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

	function updateGestWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'La modification des données du gestionnaire ".ucwords(isBold($nom." ".$prenom))." c\'est réalisé avec succès.',
      						allowOutsideClick: false,
						    confirmButtonColor: '#DD6B55',
						    confirmButtonText: 'Okey, merci.',
						})
					}, 
					200
				);
			</script>";
		return $value;
	}

	function updateGestLost($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Erreurs survenus durant la modification des données du gestionnaire : ".ucwords(isBold($nom." ".$prenom)).".',
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