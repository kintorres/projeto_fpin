<?php

include("crud.php");
  //INICIA SESSÃO

  // VERIFICA SE E-MAIL FOI ENVIADO VIA POST
if(isset($_POST['email']) && strlen($_POST['email']) > 0){

  //EMAIL E SENHA TRATADOS
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $senha = md5(sha1($_POST['senha']));

  $sql = "SELECT * FROM clube_do_livro.t_usuarios WHERE email = '$email'";
  $resultado = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $dados = mysqli_fetch_assoc($resultado);
  $total = mysqli_num_rows($resultado);
  $erro = array();

  //RECOLHO INFORMAÇÕES SOBRE O ERRO
  if($total == 0){
    $erro[] = "Este e-mail não pertence à nenhum usuário.";
  } else {
      if($dados['senha'] != $senha)
        $erro[] = "Senha incorreta.";
  }
  
  //CASO OS DADOS ESTEJAM CORRETOS, CRIA UMA NOVA SESSÃO
  if(count($erro) == 0 || !isset($erro)) {
    //CRIA UMA NOVA SESSÃO
    load_session();
    $_SESSION['cod_usuario'] = $dados['cod'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['sobrenome'] = $dados['sobrenome'];
    $_SESSION['sexo'] = $dados['sexo'];
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['nivel_de_acesso'] = $dados['nivel_de_acesso'];
  
    echo "<script>alert('Login efetuado com sucesso!');location.href='index.php';</script>";
    //CASO DADOS ESTEJAM ERRADOS, IMPRIME O ERRO
  } else {
      echo "<script>alert('$erro[0]'); location.href='index.php';</script>";
  }
}

//TERMINA CONEXAO COM O BANCO DE DADOS
mysqli_close($conn);

?> 