<?php
error_reporting(E_ALL ^ E_NOTICE);
function carregaClasse($nomeClasse){
    require_once ("class/".$nomeClasse.".php");
}
spl_autoload_register("carregaClasse");

require_once("mostraAlerta.php");
require_once("logica-usuario.php");
require_once("class/conecta.php");

$tarefaDao = new TarefaDAO($conexao);
$categoriaDao = new CategoriaDAO($conexao);
$user = usuarioLogado(); 
?>
<html>
<head>
    <title>GLAW</title>
    <meta charset="UTF-16">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.12.2.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/loja.css" rel="stylesheet" />
    <link href="../css/bootstrap.css" rel="stylesheet"/>
    <link href="../css/loja.css" rel="stylesheet" />
</head>
<body>
    <div class="nav navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">GLAW</a>
            </div>
            <div>
                <ul class="nav navbar-nav span_red">
                    <li><a href="lista-tarefas.php">Tarefas</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
            <?php 
                if(usuarioEstaLogado()){
            ?>
           <ul class="nav navbar-nav navbar-right">            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?=$user['nome']?> <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">Sair</a></li>
               </ul> 
               
            </li>
          </ul>
           <?php
                }else{
            ?>
            <form class="nav navbar-right navbar-form">
                <div class="form-group">   
                    <button type="submit" class="btn btn-warning" formaction="cadastro-usuario.php">Cadastre-se</button>       
                    <button type="submit" class="btn btn-success" formaction="index.php">Entrar</button>
                </div>
            </form>
            <?php } ?>
        </div>        
    </div> 
    
    <div class="container">
        <div class="principal">
            
            <?php
                mostraAlerta("danger");
                mostraAlerta("success");
            ?>