<?php 
require_once ("cabecalho.php");
require_once("logica-usuario.php");

?>
<div class="hero-unit">
<h1 class="hero-unit">Bem-Vindo!</h1>
</div>
<?php
if(usuarioEstaLogado()) {
?>
<p class="text-success">Você está logado como <?= $user['email']?></p><br>
<center><a class="btn btn-primary" href="logout.php">Logout</a></center>

<?php
} else {
?>

<h2>Login</h2>
	<form action='login.php' method='post'>
		<table class="table">
			<tr>
				<td>E-mail</td>
				<td><input class="form-control" type="email" name="email"></td>
			</tr>
			<tr>
				<td>Senha</td>
				<td><input class="form-control" type="password" name="senha"></td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="submit">Login</button>
					<a class="btn btn-warning" href="cadastro-usuario.php">Cadastre-se</a>
				</td>
				<td></td>
			</tr>	
		</table>
	</form>
<?php
}
?>
<?php require_once ("rodape.php");?>