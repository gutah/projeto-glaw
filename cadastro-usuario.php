<?php require_once("cabecalho.php");?>
<form class="form-horizontal" action="adiciona-usuario.php" method="post">
<fieldset>

<!-- Form Name -->
<h1>Cadastro de Usuário</h1>

<!-- Password text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirma_senha">Nome</label>
  <div class="col-md-8">
    <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prependedtext">E-mail</label>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input id="email" name="email" class="form-control" placeholder="E-mail" type="text" required="">
    </div>
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha</label>
  <div class="col-md-8">
    <input id="senha" name="senha" type="password" placeholder="Digite a senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirma_senha">Confirme Senha</label>
  <div class="col-md-8">
    <input id="confirma_senha" name="confirma_senha" type="password" placeholder="Repita a senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
   <div class="col-md-12">
    <button id="enviar" type="submit" name="enviar" class="btn btn-primary">Cadastrar</button>
    <a id="cancela" href="index.php" name="cancela" class="btn btn-danger">Cancelar</a>
  </div>
</div>

</fieldset>
</form>

<?php require_once("rodape.php");?>
