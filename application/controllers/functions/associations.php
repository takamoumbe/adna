<?php  
	
	function isBold($value){
		return "<b>$value</b>";
	}

	function insertAssociaWin($nom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Félicitation, l\'enregistrement de l\'association : ".ucwords(isBold($nom))." c\'est réalisé avec succès.',
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

	function insertAssociaLost($nom, $sigle){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Des problèmes sont survenus durant l\'enregistrement de l\'association : ".ucwords(isBold($nom)).".',
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

	function updateAssociaWin($nom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Félicitation, les informations de l\'association : ".ucwords(isBold($nom))." ont été mise  à jour avec succès.',
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

	function updateAssociaLost($nom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Echec',
      						html: 'Problèmes survenus durant la modification des informations de l\'association : ".ucwords(isBold($nom)).".',
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

	function inserAssociaOverLimit(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Le nombre max d\'engagements à déjà été atteint désolé.',
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