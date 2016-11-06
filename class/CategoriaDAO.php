<?php
require_once("conecta.php");
require_once("Categoria.php");
/**
 * Created by PhpStorm.
 * User: gmaciel
 * Date: 30/05/2016
 * Time: 15:55
 */
class CategoriaDAO
{
    private $conexao;
    function __construct($conexao)
    {
        $this->setConexao($conexao);
    }

    public function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }
    public function getConexao()
    {
        return $this->conexao;
    }

    public function listaCategorias(){
        $categorias = array();
        $query = "SELECT * FROM categorias";
        $resultado = mysqli_query($this->conexao, $query);

        while ($categoria_atual = mysqli_fetch_assoc($resultado)){
            $categoria = new Categoria();
            $categoria->setId($categoria_atual['id']);
            $categoria->setNome($categoria_atual['nome']);
            array_push($categorias, $categoria);
        }
        return $categorias;
    }

}