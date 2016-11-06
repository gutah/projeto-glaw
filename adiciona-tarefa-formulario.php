<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");

$categoria = "categoria_id=1";
$categorias = $categoriaDao->listaCategorias();

verificaUsuario();
?>
	<h1>Cadastro de Tarefa</h1>
	<form action="adiciona-tarefa.php" method="post" class="form-horizontal">
		<?php require_once("tarefa-formulario-base.php");?>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Adicionar"></label>
  <div class="col-md-8">
    <button id="Adicionar" type='submit'name="Adicionar" class="btn btn-primary">Adicionar</button>
    <a class="btn btn-danger" href="index.php" href"index.php">Cancelar</a>
  </div>
</div>

</fieldset>
</form>
<?php require_once("rodape.php")?>