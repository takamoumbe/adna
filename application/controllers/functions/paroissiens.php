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

	function nextCaracter($letter){
		$data = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
		$key = array_search(strtolower($letter), $data);
		if ($key == 25) {
			return $data[0];
		} else {
			return $data[($key+1)];
		}
	}	

	function extractYear($year) {
		$data = date('y', strtotime($year));
		return $data;
	}

	
	function isBold($value){
		return "<b>$value</b>";
	}

	function paroissienExit(){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Il semblerait qu'\un paroissien du même ait déjà été enregistré dans le système.',
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

	function insertParoisWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Félicitation, l\'enregistrement du paroissien : ".ucwords(isBold($nom." ".$prenom))." c\'est réalisé avec succès.',
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

	function insertParoisLost($nom, $sigle){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Des problèmes sont survenus durant l\'enregistrement du paroissien : ".ucwords(isBold($nom." ".$prenom)).".',
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

	function updateParoisWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Félicitation, la modification des données du paroissien : ".ucwords(isBold($nom." ".$prenom))." c\'est réalisé avec succès.',
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

	function updateParoisLost($nom, $sigle){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Des problèmes sont survenus durant la modification des données du paroissien : ".ucwords(isBold($nom." ".$prenom)).".',
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

	function deleteParoisWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Le compte de ".ucwords(isBold($nom." ".$prenom))." a été désactivé avec succès.',
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

	function deleteParoisLost($nom, $sigle){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Impossible de désactiver le compte de : ".ucwords(isBold($nom." ".$prenom)).".',
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

	function reloadParoisWin($nom, $prenom){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Félicitations',
      						html: 'Le compte de : ".ucwords(isBold($nom." ".$prenom))." a été réactivé avec succès.',
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

	function reloadParoisLost($nom, $sigle){
		$value = "
			<script>
				setTimeout(
					function () { 
						Swal.fire({
							title: 'Impossible',
      						html: 'Des problèmes sont survenus durant la réactivation du compte : ".ucwords(isBold($nom." ".$prenom)).".',
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