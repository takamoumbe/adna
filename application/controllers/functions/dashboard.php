<?php  

	function loginLost(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Désolé mais votre <b> login </b> ou votre <b>Password</b> est incorrect',
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

	function loginWin(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Connexion établie avec suucès',
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