<?php
require_once("conecta.php");

function insereUsuario($conexao, $emailValido, $senhaValida, $nome){
	$senhaMd5 = md5($senhaValida);
	$email = mysqli_real_escape_string($conexao, $emailValido);
	$nome = mysqli_real_escape_string($conexao, $nome);
	$query = "insert into usuarios (email, senha, nome) values('{$email}', '{$senhaMd5}', '{$nome}');";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function buscaUsuario($conexao, $email, $senha){
	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao, $email);
	$query = "select * from usuarios where email ='{$email}' and senha ='{$senhaMd5}';";
	$res = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($res);
	return $usuario;
}

function buscaEmailUsuario($conexao, $email){
	$query = "select * from usuarios where email ='{$email}';";
	$res = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($res);
	return $usuario;
}