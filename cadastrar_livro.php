<?php

include 'crud.php';
protect();

//DADOS VINDOS ATRQVÉS DO MÉTODO POST
$dados['nome'] = isset($_POST['nome']) ? $_POST['nome']: false;
$dados['autor'] = isset($_POST['autor']) ? $_POST['autor']: false;
$dados['descricao'] = isset($_POST['descricao']) ? $_POST['descricao']: false;
$dados['data_de_lancamento'] = isset($_POST['data_de_lancamento']) ? $_POST['data_de_lancamento']: false;
$dados['url_img'] = isset($_FILES['url_img']) ? md5(time().$_FILES['url_img']['name']).".jpg": false;

if($dados['url_img']!='')
{
  $upload_directory = "img/uploaded/";
  if(move_uploaded_file($_FILES['url_img']['tmp_name'], $upload_directory.$dados['url_img'])){    
    cadastraLivro($conn, $dados);                
  }
} else {
  echo "<script>alert('Você não preencheu os dados do livro!'); location.href='cadastro_livro.php';</script>";
}

mysqli_close($conn);

?>
