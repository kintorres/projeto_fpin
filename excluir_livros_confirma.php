<?php
	include 'crud.php';
	protect();

	if($_SESSION['nivel_de_acesso'] != 1){
  		echo "<script>alert('Você não tem permissão para acessar essa página!'); location.href='area_restrita.php';</script>";
	}

	excluirLivros($conn, $_POST['selecao']);
?>








