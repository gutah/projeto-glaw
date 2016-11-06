<fieldset>
<!-- Campo ID Tarefa Manter escondido-->
<div class="form-group">
  <div class="col-md-8">
  <input id="id_tarefa" name="id_tarefa" type="hidden" value="<?=$tarefa->id?>" placeholder="Tarefa" class="form-control input-md" required="">
    
  </div>
  </div>

<!-- Campo Nome -->
<div class="form-group">
  <label class="col-md-2 control-label" for="nome">Nome</label>  
  <div class="col-md-10">
  <input id="nome" name="nome" type="text" value="<?=$tarefa->nome?>" placeholder="Tarefa" class="form-control input-md" required="">
    
  </div>
  </div>

<!-- Campo Data Inicial-->
<div class="form-group">
  <label class="col-md-2 control-label" for="inicio">Inicio</label>  
  <div class="col-md-10">
    <input id="inicio" name="inicio" type="date" class="form-control input-md" placeholder="" value="<?=$tarefa->inicio?>">
  </div>
</div>

<!-- Campo Data Final-->
<div class="form-group">
  <label class="col-md-2 control-label" for="fim">Fim</label>  
  <div class="col-md-10">
  <input id="fim" name="fim" type="date" placeholder="" class="form-control input-md" value="<?=$tarefa->fim?>">
    
  </div>
</div>

<!-- Select Prioridade -->
<div class="form-group">
  <label class="col-md-2 control-label" for="categoria_id">Prioridade</label>
  <div class="col-md-10">
    <select class="form-control" name="categoria_id">                    
        <?php
           foreach ($categorias as $categoria):
           //Compara a categoria da tarefa para selecionar a correta
           if (isset($tarefa)){
               $categoriaEscolhida = $categoria->getId() === $tarefa->categoria->getId();
               $selecionado = $categoriaEscolhida ? "selected='selected'" : "";
           }
        ?>
        <option value="<?=$categoria->getId()?>" <?=$selecionado?>>
            <?=$categoria->getNome()?>
        </option>
        <?php endforeach;?>
    </select>
  </div>
</div>