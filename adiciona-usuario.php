<?php require_once("cabecalho.php");
require_once("banco-usuario.php");
require_once("logica-usuario.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
$c_senha = $_POST['confirma_senha'];
$nome = $_POST['nome'];

$emailValido = validaCadastroUsuarioEmail($conexao, $email);
$senhaValida = validaCadastroUsuarioSenha($senha, $c_senha);

if(insereUsuario($conexao, $emailValido, $senhaValida, $nome)){ 
	$_SESSION["success"] = "E-mail: {$emailValido} cadastrado com sucesso.";
	header("Location: index.php");
	die();

} else { 
    $msg = mysqli_error($conexao); 
    $_SESSION["danger"] = "E-mail {$emailValido} não cadastrado com sucesso. {$msg}";
	header("Location: cadastro-usuario.php");
	die();
}
require_once("rodape.php");
  