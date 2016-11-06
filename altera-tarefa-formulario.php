<?php 
require_once("cabecalho.php");

verificaUsuario();//Verifica se o usário esta logado

$categorias = new Categoria();
$tarefa = new Tarefa();
$tarefa->id=$_POST['id_tarefa'];
//Busca tarefa no banco 
$tarefa = $tarefaDao->buscaTarefa($tarefa);
//Busca categorias no banco
$categorias = $categoriaDao->listaCategorias();
//Insere formulário
?>
<h1>Alterando Tarefa</h1>
<form action="altera-tarefa.php" method="post" class="form-horizontal">
    <!-- Chama Formulário Base -->
    <?php require_once("tarefa-formulario-base.php");?>
    <!-- Botão submit formulário -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Alterar"></label>
        <div class="col-md-4">
            <button id="Alterar" type='submit'name="alterar" class="btn btn-primary">Alterar</button>
            <a href="lista-tarefas.php" id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
<?php require_once("rodape.php")?>