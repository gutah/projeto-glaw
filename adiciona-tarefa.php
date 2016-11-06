<?php 
require_once("cabecalho.php");

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$tarefa = new Tarefa($_POST['nome'], $categoria, $user['id']);
$tarefa->id = null;
$tarefa->setInicio($_POST['inicio']);
$tarefa->setFim($_POST['fim']);

if($tarefaDao->insereTarefa($tarefa)){
	$_SESSION["success"] = "A tarefa $tarefa->nome, foi incluida com sucesso.";
	header("Location: lista-tarefas.php");	
}else {
    $msg = mysqli_error($conexao);//Recebe mensagem de erro do banco
    $_SESSION["success"] = "A tarefa $tarefa->$nome?></strong> não foi incluida com sucesso $msg.";
    header("Location: lista-tarefas.php");
}
require_once("rodape.php");