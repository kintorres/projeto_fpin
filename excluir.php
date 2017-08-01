<?php
	include 'crud.php';
	protect();
	deletaUsuario($conn, $_SESSION['cod_usuario']);
?>