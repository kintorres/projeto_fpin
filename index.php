<?php
  include 'crud.php';
  load_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>ClubeDoLivro.com - Fomentando o conhecimento</title>

  <link href="css/style.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body style="height:1600px">

      <!-- BARRA DE NAVEGAÇÃO -->

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">

          <!-- Botão Menu -->

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Marca -->

          <a class="navbar-brand" href="#">Clube do Livro</a>
        </div>

        <!-- Itens do Menu -->

        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Romance</a></li>
              <li><a href="#">Científico</a></li>
              <li><a href="#">Finanças</a></li>
            </ul>
          </li>
          <li class="active"><a href="#">Planos</a></li> -->
        </ul>

        <!-- Buscar Livros -->

        <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar livros...">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
      

      <!-- BARRA DE NAVEGAÇÃO DA DIREITA -->

        <?php
          if(!isset($_SESSION['cod_usuario']) || !is_numeric($_SESSION['cod_usuario'])) {
            echo "<ul class='nav navbar-nav navbar-right'><li><a href='cadastro.html'><span class='glyphicon glyphicon-user'></span>&nbsp&nbspCadastrar</a></li><li><a href='' data-toggle='modal' data-target='#login-modal'><span class='glyphicon glyphicon-log-in'></span>&nbsp&nbspEntrar</a></li></ul></div></nav><div class='modal fade' id='login-modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'><div class='modal-dialog'><div class='loginmodal-container'><h1>Entre na sua conta</h1><br><form method='POST' action='valida_login.php'><input type='text' name='email' placeholder='E-mail' required><input type='password' name='senha' placeholder='Senha' required><input type='submit' name='login' class='login loginmodal-submit' value='Entrar'></form><div class='login-help'><a href='cadastro.html'>Ainda não é cadastrado? Cadastre-se!</a><br></div></div></div></div>";
          } else {
            echo "<ul class='nav navbar-nav navbar-right'><li><a href='area_restrita.php'><span class='glyphicon glyphicon-user'></span>&nbsp&nbsp".$_SESSION['nome']."</a></li><li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>&nbsp&nbspSair</a></li></ul></div></nav>";
          }
        ?>

      
      

      <!-- CARROUSEL -->

      <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>


        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          
          <!-- LEGENDA DO CARROUSEL -->
          <div class="carousel-caption">
            <h3>Seja bem vindo ao Clube do Livro</h3>
            <p>O melhor lugar para comprar e trocar livros</p>
          </div>

          <div class="item active">
            <img src="img/banner1.jpg" alt="Livros" style="width:100%; height: 100%;">
          </div>

          <div class="item">
            <img src="img/banner2.jpg" alt="Chicago" style="width:100%; height: 100%;">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>


      
      <!-- LISTA DE LIVROS DISPONÍVEIS -->
      <div class="container">
        <div class="row">
          <h1>Livros</h1>

          <?php 
          
          $livros = retornaLivros($conn);
          
          if(count($livros) >= 1 ){
            foreach ($livros as $livro) {
              echo "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6' style='height: 100%;'><img src='img/uploaded/".$livro['url_img']."' class='img-responsive'><div class='caption'><h4>".$livro['nome']."</h4><p class='text-justify'>".$livro['descricao']."</p><a href='' class='btn btn-md btn-primary btn-block'><span class='glyphicon glyphicon-plus'></span>Adicionar</a></div></div>";
            }
          } else {
            echo "Sem livros cadastrados no momento!";
          }
          

          ?>

          
          
        </div>
      </div>
      
     <!-- /.control-box -->   

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-3.2.1.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script> 

</script> 
</body>
</html>