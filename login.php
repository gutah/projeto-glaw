<?php require_once("cabecalho.php"); 
require_once("banco-usuario.php");
require_once("logica-usuario.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = buscaUsuario($conexao, $email, $senha);

if($usuario == null){
	$_SESSION["danger"]="Usuário ou senha inválido.";
	header("Location: index.php");
}else{
	logaUsuario($usuario);
	$_SESSION["success"]="Logado com sucesso.";
	header("Location: lista-tarefas.php");
}
die();