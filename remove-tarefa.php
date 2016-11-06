<?php 
require_once("cabecalho.php");
require_once("logica-usuario.php");
verificaUsuario();

$tarefa = new Tarefa;
$tarefa->id = $_POST['id_tarefa'];

$tarefaDao->removeTarefa($tarefa);
$_SESSION["success"]="A tarefa foi removida com sucesso.";
header("Location: lista-tarefas.php");
die();
