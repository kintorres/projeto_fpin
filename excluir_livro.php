<?php
	include 'crud.php';
	protect();

	if($_SESSION['nivel_de_acesso'] != 1){
  		echo "<script>alert('Você não tem permissão para acessar essa página!'); location.href='area_restrita.php';</script>";
	}
?>

<h1>Excluir livros</h1>
<form action="excluir_livros_confirma.php" method="POST">
	<table>
		<tr>
		<th>Selecione</th>
			<th>Código</th>
			<th>Nome</th>
			<th>Autor</th>
			<th>Descricao</th>
			<th>Data de Lançamento</th>
		</tr>

		<?php
		$livros = retornaLivros($conn);

		foreach($livros as $row) {
			echo "<tr>";
			echo "<td><input type='checkbox' name='selecao[]' value='".$row['cod']."'></td>";
			echo "<td>".$row['cod']."</td>";
			echo "<td>".$row['nome']."</td>";
			echo "<td>".$row['autor']."</td>";
			echo "<td>".$row['descricao']."</td>";
			echo "<td>".$row['data_de_lancamento']."</td>";
			echo "</tr>";
		}

		?>
	</table>
	<br>
	<p><a href="area_restrita.php"><input type="button" value="Voltar"></a>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" value="Excluir"></p>
	</form>