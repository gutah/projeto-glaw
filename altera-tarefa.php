<?php 
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();


$categoria = new Categoria;
$categoria->setId($_POST['categoria_id']);

$tarefa = new Tarefa($_POST['nome'], $categoria, $user['id']);
$tarefa->id 		  = $_POST['id_tarefa'];
$tarefa->inicio       = $_POST['inicio'];
$tarefa->fim 		  = $_POST['fim'];

if($tarefaDao->alteraTarefa($tarefa)){
	$_SESSION["success"] = "A tarefa $tarefa->nome, foi alterada com sucesso.";
	header("Location: lista-tarefas.php");
}else { 
    $msg = mysqli_error($conexao);//Recebe mensagem de erro do banco
	$_SESSION["danger"] = "A tarefa $tarefa->nome não foi alterada com sucesso: $msg."; 
	header("Location: lista-tarefas.php");
}
require_once ("rodape.php");