<?php

// FUNÇÃO QUE CARREGA OU INICIA UMA NOVA SESSÃO
function load_session(){
	if(!isset($_SESSION))
		session_start();
}

function update_session($data){
	load_session();

    $_SESSION['nome'] = $data['nome'];
    $_SESSION['sobrenome'] = $data['sobrenome'];
    $_SESSION['sexo'] = $data['sexo'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['senha'] = $data['senha'];

}

function kill_session(){

	// Inicializa a sessão.
	// Se estiver sendo usado session_name("something"), não esqueça de usá-lo agora!
	load_session();
	
	// Apaga todas as variáveis da sessão
	$_SESSION = array();
	
	// Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
	// Nota: Isto destruirá a sessão, e não apenas os dados!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
			);
	}

	// Por último, destrói a sessão
	session_destroy();
}

// FUNÇÃO QUE OBRIGA EFETUAR LOGIN
function protect(){

	load_session();

	if(!isset($_SESSION['cod_usuario']) || !is_numeric($_SESSION['cod_usuario'])) {
		echo "<script>alert('Você precisa efetuar login!'); location.href='index.php';</script>";
	}
}


?>