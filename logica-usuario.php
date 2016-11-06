<?php
require_once("banco-usuario.php");
session_start();
function usuarioEstaLogado() {
     return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
	if(!usuarioEstaLogado()) {
	$_SESSION["danger"] = "Você não tem acesso a essa funcionalidade.";
	Header("Location: index.php");
	die();
	}
}

function logaUsuario($usuario) {
  $_SESSION["usuario_logado"] = $usuario;
}

function usuarioLogado(){
	return $_SESSION["usuario_logado"];
}

function logout(){
	session_destroy();
	session_start();
}

function validaCadastroUsuarioEmail($conexao, $email){
	$resultado = buscaEmailUsuario($conexao, $email);
	if ($resultado == null) {
		return $email;
	}else{
		$_SESSION["danger"] = "E-mail já cadastrado.";
		header("Location: cadastro-usuario.php");
		die();
	}

}

function validaCadastroUsuarioSenha($senha, $c_senha){
	if ($senha == $c_senha) {
		return $senha;		
	}else{
		$_SESSION["danger"] = "As senhas informadas não são iguais.";
		header("Location: cadastro-usuario.php");
		die();
	}
}

//Função utilizada para colorir as linhas das tabelas de forma automatica
function alert_categoria($cate){	
	switch ($cate) {
	    case 1:
	        return "danger";
	    break;
	    case 2:
	        return "warning";
	    break;
	    case 3:
	        return "info";
    	break;
	    default:
	    	return "active";
	    break;
	}
}