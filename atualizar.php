<?php
include 'crud.php';
protect();

//DADOS VINDOS ATRQVÉS DO MÉTODO POST
$dados['nome'] = $_POST['nome'];
$dados['sobrenome'] = $_POST['sobrenome'];
$dados['sexo'] = $_POST['sexo'];
$dados['email'] = $_POST['email'];
$dados['senha'] = md5(sha1($_POST['senha']));

$sql = "SELECT email FROM clube_do_livro.t_usuarios WHERE email = '". $dados['email'] . "'";

$result = mysqli_query($conn, $sql);
$array = mysqli_fetch_array($result);
$email_array = $array['email'];


// SE EMAIL ESTIVER VAZIO OU NULO
if($dados['email'] == "" || $dados['email'] == null){
	echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='cadastro.html';</script>";
    // CASO EMAIL ESTEJA PREENCHIDO
} else {
    	//VERIFICA SE EMAIL JÁ ESTA CADASTRADO
	if(($email_array == $dados['email']) && ($email_array != $_SESSION['email'])) {

		echo"<script language='javascript' type='text/javascript'>alert('Esse email já está cadastrado!');window.location.href='editar_dados.php';</script>";
		die();
        // CASO NÃO ESTEJA CADASTRADO, INSERE NOVO USUÁRIO NO BANCO DE DADOS
	}else{

		if($dados['senha'] != $_SESSION['senha']) {

        	echo"<script language='javascript' type='text/javascript'>alert('Senha incorreta!');window.location.href='editar_dados.php';</script>";

		} else {
			//ATUALIZA USUÁRIO
			atualizarCadastroUsuario($conn,$_SESSION['cod_usuario'],$dados);
			update_session($dados);
		}
      	

	}
}

//TERMINA CONEXAO COM O BANCO DE DADOS
mysqli_close($conn);

?>
