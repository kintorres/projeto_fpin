<?php
include 'crud.php';
protect();

$dados = retornaDadosUsuario($conn, $_SESSION['cod_usuario']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ClubeDoLivro.com - Fomentando o conhecimento</title>
</head>
<body>
	<h1>Editar dados</h1>
	<form method="POST" action="atualizar.php">
		<p>Nome: 
		<br><input type="text" name="nome" value="<?php echo $dados['nome']?>"></p>
		<p>Sobrenome: 
		<br><input type="text" name="sobrenome" value="<?php echo $dados['sobrenome']?>"></p>
		<p>Sexo: 
		<br><input type="radio" name="sexo" value="M" <?php if($dados['sexo'] == "M"){echo "checked";}?>> Masculino
  		<br><input type="radio" name="sexo" value="F" <?php if($dados['sexo'] == "F"){echo "checked";}?>> Feminino</p>
		<p>E-mail: 
		<br><input type="email" name="email" value="<?php echo $dados['email']?>"></p>
		<p>Senha: 
		<br><input type="password" name="senha"></p>
		<p><a href="area_restrita.php"><input type="button" value="Voltar"></a>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" value="Atualizar"></p>
	</form>
</body>
</html>