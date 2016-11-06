<?php 
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
$user_id = $user['id'];
$categorias = $categoriaDao->listaCategorias();

?>

<h2>Tarefas</h2>
	<!--<div class="">
		<button id="Adicionar" type='submit'name="Adicionar" href="#formulario" data-toggle="collapse" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span></button>
	</div>-->
	<div id="formulario" class="">
		<form action="adiciona-tarefa.php" method="post" class="form-horizontal">
            <?php require_once("tarefa-formulario-base.php");?>
            <!-- Button (Double) -->
            <div class="form-group">
                <div class="col-md-12">
                    <button id="Adicionar" type='submit' name="Adicionar" class="btn btn-block btn-lg btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
	</div>

<div class="table table-responsive visible-xs-">
	<?php 
	$tarefas = $tarefaDao->listaTarefa($user_id,$ordem);
	if ($tarefas == 0 or $tarefas == null) { 
			?>
				<h4 class="alert alert-warning">Você não possui nenhuma tarefa.</h4>
    <?php
    }else{
	?>
	<table class="table table-striped table-hover">
		<!--Cabeçalho-->
		<thead class="thead-inverse">
	   		<tr>
				<th>Nome</th>
				<th>Inicio</th>
				<th>Fim</th>
				<th>Prioridade</th>
				<th>O que deseja fazer?</th>
			</tr>
		</thead>
		<!--Inicio do laço-->
		<?php
			foreach ($tarefas as $tarefa) :
            ?>
	<tbody>
		<tr class="<?=alert_categoria($tarefa->categoria->getId())?>">
			<td><?=$tarefa->nome?></td>
			<td><?=date('d/m/y', strtotime($tarefa->inicio))?></td>
			<td><?=date('d/m/y', strtotime($tarefa->fim))?></td>
			<td><?=$tarefa->categoria->getNome()?></td>
			<td>
				<form method="post">
					<input type="hidden" name="id_tarefa" value="<?=$tarefa->id?>">
					<div class="col-md-12 " role="group" aria-label="...">
						<button type="submit" class="btn btn-primary btn-info" formaction="altera-tarefa-formulario.php">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<button type="submit" class="btn btn-primary btn-danger" formaction="remove-tarefa.php">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</div>
				</form>				
			</td>
		</tr>
	</tbody>		
		<?php
			endforeach;
		}
		?>
		</table>

	</div>
<?php require_once("rodape.php")?>