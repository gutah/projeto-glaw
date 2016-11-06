<?php
require_once ("Categoria.php");
class Tarefa{

	public $id;
	public $nome;
	public $inicio; 
	public $fim;
	public $categoria; 
	public $user_id;

    function __construct($nome=null, Categoria $categoria=null, $user_id=null){
        $this->nome=$nome;
        $this->categoria=$categoria;
        $this->user_id=$user_id;
    }

    function getInicio(){
        if($this->inicio == null or $this->inicio=''){
            return $this->inicio=date('Y-m-d');
        }else{
            return $this->inicio;
        }
    }

    function setInicio($inicio){
        if($inicio == null OR $inicio == ""){
            $this->inicio=date('Y-m-d');
        }else{
            $this->inicio = $inicio;
        }
    }

    function getFim(){
        if($this->fim == null or $this->fim=''){
            return $this->fim=date('Y-m-d');
        }else{
            return $this->fim;
        }
    }

    function setFim($fim){
        if($fim == null OR $fim == ""){
            $this->fim=date('Y-m-d');
        }else{
            $this->fim = $fim;
        }
    }
}