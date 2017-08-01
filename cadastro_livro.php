<!DOCTYPE html>
<?php
	include 'util.php';
	protect();

	if($_SESSION['nivel_de_acesso'] != 1){
  		echo "<script>alert('Você não tem permissão para acessar essa página!'); location.href='area_restrita.php';</script>";
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ClubeDoLivro.com - Fomentando o conhecimento</title>
</head>
<body>
	<h1>Cadastrar Livro</h1>
	<form method="POST" action="cadastrar_livro.php" enctype="multipart/form-data">
		<p>Nome: 
		<br><input type="text" name="nome" required></p>
		<p>Autor: 
		<br><input type="text" name="autor" required></p>
		<p>Descrição(Máximo de 255 caracteres): 
		<br><textarea name="descricao" cols="40" rows="5" required></textarea></p>
		<p>Data de Lançamento: 
		<br><input type="date" name="data_de_lancamento" required></p>
		<p>Upload da capa do livro:
		<br><input type="file" name="url_img" required>
		<p><br><br><a href="area_restrita.php"><input type="button" value="Voltar"></a>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" value="Cadastrar"></p>
	</form>
</body>
</html>