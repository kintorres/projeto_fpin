<?php
	include("util.php");
	protect();

	if($_SESSION["nivel_de_acesso"] == 1) 
		echo "<br><b>Ferramentas de administrador:</b>. <a href='cadastro_livro.php'>Cadastrar livro</a>  <a href='excluir_livro.php'>Excluir livro</a>";

?>
<p>Você está logado em:</p>

<?php 

	foreach($_SESSION as $key => $value) 
		echo $key.": ".$value."<br>";

?>

<p>
	<a href="index.php">Página principal</a>
	<a href="excluir_conta.php">Excluir</a>
	<a href="editar_dados.php">Editar</a>
	<a href="logout.php">Logout</a>
</p>

