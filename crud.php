<?php

include 'util.php';

//CONFIGURA OS PARÂMETROS DO SERVIOR
$servername = "localhost";
$username = "kintorres";
$password = "L71MMGF08Q";
$dbname = "clube_do_livro";
$table = "";

// CRIA A CONEXÃO
$conn = mysqli_connect($servername, $username, $password, $dbname);

// VERIFICA SE FOI POSSÍVEL CONECTAR COM O BANCO DE DADOS
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// CONSTRUTOR DINÂMICO DE QUERY DELETE
function build_sql_delete($table, $where)
{

	$sql = "DELETE FROM $table WHERE $where";

	return($sql);
}

// CONSTRUTOR DINÂMICO DE QUERY DELETE
function build_sql_delete_some($table, $where)
{

	$key = array_keys($where);
	$val = array_values($where);
	$sql = "DELETE FROM $table WHERE cod=" . implode(' or cod=', $val) . "";
	
	return($sql);
}

// CONSTRUTOR DINÂMICO DE QUERY SELECT
function build_sql_select($table, $where)
{

	$sql = "SELECT * FROM $table WHERE $where";

	return($sql);
}

// CONSTRUTOR DINÂMICO DE QUERY INSERT
function build_sql_insert($table, $data) {
	$key = array_keys($data);
	$val = array_values($data);
	$sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
	. "VALUES ('" . implode("', '", $val) . "')";

	return($sql);
}

// CONSTRUTOR DINÂMICO DE QUERY UPDATE
function build_sql_update($table, $data, $where)
{
	$cols = array();

	foreach($data as $key=>$val) {
		$cols[] = "$key = '$val'";
	}
	$sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

	return($sql);
}


// FUNÇÃO PARA CRIAR UM NOVO USUÁRIO NO SISTEMA
function criarNovoUsuario($conn, $dados) {

	$table = "t_usuarios";
	
	//QUERY DE INSERÇÃO
	$sql = build_sql_insert($table, $dados);

	//VERIFICA SE USUÁRIO FOI CRIADO COM SUCESSO
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Usuário cadastrado com sucesso!');location.href='index.php';</script>";
	} else {
		echo "<script>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
	}
}

//// FUNÇÃO PARA CRIAR UM NOVO USUÁRIO NO SISTEMA
function atualizarCadastroUsuario($conn, $cod, $dados){

	$table = "t_usuarios";
	$where = "cod = ". $cod;

	$sql = build_sql_update($table, $dados, $where);
	$result = mysqli_query($conn, $sql);

	//VERIFICA SE USUÁRIO FOI CRIADO COM SUCESSO
	if ($result) {
		echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
	} else {
		echo "<script>alert('Não foi possível atualizar os dados.');</script>";
	}

	//RETORNA PARA A PAGINA AREA_RESTRITA.PHP
	echo "<script>location.href='area_restrita.php';</script>";

}

function retornaDadosUsuario($conn, $cod){

	$table = "t_usuarios";
	$where = "cod = ". $cod;

	$sql = build_sql_select($table,$where);
	$result = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($result);

	//VERIFICA SE USUÁRIO FOI CRIADO COM SUCESSO
	if (mysqli_query($conn, $sql)) {
		mysqli_free_result($result);
		return $array;
	} else {
		echo "<script>alert('Não foi possível retornar dados desse usuário');window.location.href='area_restrita.html'</script>";
	}


}

function deletaUsuario($conn, $cod) {

	$table = "t_usuarios";
	$where = "cod =". $cod;

	$sql = build_sql_delete($table, $where);
	$result = mysqli_query($conn, $sql);

	//VERIFICA SE USUÁRIO FOI DELETADO (ALTERAR!!!)
	if ($result) {
		echo "<script>alert('Usuário excluído com sucesso!');window.location.href='logout.php'</script>";
	} else {
		echo "<script>alert('Não foi possível deletar usuário');window.location.href='area_restrita.php'</script>";
	}

	mysqli_free_result($result);
}

function cadastraLivro($conn, $dados){
	$table = "t_livros";
	
	//QUERY DE INSERÇÃO
	$sql = build_sql_insert($table, $dados);
	$result = mysqli_query($conn, $sql);
	//VERIFICA SE O LIVRO FOI CADASTRADO COM SUCESSO
	if ($result) {
		echo "<script>alert('Livro cadastrado com sucesso!');location.href='index.php';</script>";
	} else {
		echo "<script>alert('Não foi possível cadastrar esse livro');window.location.href='cadastro_livro.php'</script>";
	}

	mysqli_free_result($result);
}

function retornaLivros($conn) {
	$table = "t_livros";
	$array = array();

	$sql = "SELECT * FROM $table";
	$result = mysqli_query($conn, $sql);

	if ($result) {

		$index = 0;
		while($row = mysqli_fetch_assoc($result)){ 
			$array[$index] = $row;
			$index++;
		}

		
	}

	mysqli_free_result($result);

	return $array;
}

function excluirLivros($conn, $where){

	$table = "t_livros";
	$urls = array();


	$sql_imgs_urls = "SELECT url_img FROM $table WHERE cod=" . implode(' or cod=', $where) . "";
	$result_urls = mysqli_query($conn, $sql_imgs_urls);

	if($result_urls) {
		$index = 0;
		while($row= mysqli_fetch_assoc($result_urls)){ 
			$filename = "img/uploaded/".$row['url_img'];
			if (file_exists($filename)) {
				unlink($filename);
			} else {
				echo 'Não foi possivel deletar '.$filename;
			}
			$index++;
		}
	}


	$sql_delete = build_sql_delete_some($table, $where);

	$result = mysqli_query($conn, $sql_delete);

	//VERIFICA SE O LIVRO FOI DELETADO
	if ($result) {

		echo "<script>alert('Livro(s) excluído(s) com sucesso!');window.location.href='area_restrita.php'</script>";
	} else {
		echo "<script>alert('Não foi possível excluir livro(s)');window.location.href='area_restrita.php'</script>";
	}

	mysqli_free_result($result_urls);
	
}

?>