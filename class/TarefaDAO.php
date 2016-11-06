<?php
//Chamada de funções
require_once("conecta.php");

class TarefaDAO
{
    private $conexao;
    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    //Lista as tarefas por Usuário
    public function listaTarefa($user_id, $ordem)
    {
        if ($ordem == null) {
            $ordem = "id";
        }
        //Monta um Array
        $tarefas = array();
        //Monta a Query
        $query = "SELECT t.*, c.nome AS nome_categoria FROM tarefas AS t join categorias AS c ON c.id=t.categoria_id  WHERE t.id_usuario={$user_id} ORDER BY '{$ordem}'";
        //Executa a Query
        $resultado = mysqli_query($this->conexao, $query);
        //Para cada Item retornado no banco ele preenche o Array
        while ($tarefa_atual = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($tarefa_atual['categoria_id']);
            $categoria->setNome($tarefa_atual['nome_categoria']);

            $tarefa = new Tarefa($tarefa_atual['nome'], $categoria, $tarefa_atual['id_usuario']);
            $tarefa->inicio = $tarefa_atual['data_inicio'];
            $tarefa->fim = $tarefa_atual['data_fim'];
            $tarefa->id = $tarefa_atual['id'];
            array_push($tarefas, $tarefa);
        }
        //Retorna um vetor de tarefas (Lista)
        return $tarefas;
    }

    //Inseri a tarefa no Banco
    public function insereTarefa($tarefa)
    {
        //Trata Query Injection
        $nome = mysqli_real_escape_string($this->conexao, $tarefa->nome);
        $inicio = mysqli_real_escape_string($this->conexao, $tarefa->inicio);
        $fim = mysqli_real_escape_string($this->conexao, $tarefa->fim);

        //Monta a Query para inserir
        $query = "INSERT INTO tarefas (nome, data_inicio, data_fim, categoria_id, id_usuario) VALUES ('{$nome}','{$inicio}','{$fim}','{$tarefa->categoria->getId()}', {$tarefa->user_id});";

        //Passa a Query para o banco (totalmente tratada)
        $resultadoDaInsercao = mysqli_query($this->conexao, $query);
        //Retorna o resiltado da inserção (Positivo ou Negativo)
        return $resultadoDaInsercao;
    }

    //Altera a tarefa no banco
    public function alteraTarefa($tarefa)
    {
        //Trata Query Injection
        $nome = mysqli_real_escape_string($this->conexao, $tarefa->nome);
        $inicio = mysqli_real_escape_string($this->conexao, $tarefa->inicio);
        $fim = mysqli_real_escape_string($this->conexao, $tarefa->fim);
        //Monta a Query
        $query = "UPDATE tarefas SET nome='{$nome}', data_inicio='{$inicio}', data_fim='{$fim}', categoria_id={$tarefa->categoria->getId()} WHERE id={$tarefa->id};";
        //Executa a Query no banco
        $resultado = mysqli_query($this->conexao, $query);
        //Retorna o resiltado da inserção (Positivo ou Negativo)
        return $resultado;
    }

    //Busca as Tarefas no Banco
    public function buscaTarefa($tarefa)
    {
        //Monta a Query
        $query = "SELECT * FROM tarefas WHERE id={$tarefa->id};";
        //Executa a Query no Banco
        $resultado = mysqli_query($this->conexao, $query);

        $tarefa_atual = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($tarefa_atual['categoria_id']);

        $tarefa_select = new Tarefa($tarefa_atual['nome'], $categoria, $tarefa_atual['id_usuario']);
        $tarefa_select->id = $tarefa_atual['id'];
        $tarefa_select->inicio = $tarefa_atual['data_inicio'];
        $tarefa_select->fim = $tarefa_atual['data_fim'];

         //Retorna o resultado da inserção (Positivo ou Negativo)
        return $tarefa_select;
    }

    //Remove a tarefa do banco
    public function removeTarefa($tarefa)
    {
        //Executa a Query
        $query = "DELETE FROM tarefas WHERE id={$tarefa->id}";
        //Retorna o resiltado da inserção (Positivo ou Negativo)
        return mysqli_query($this->conexao, $query);
    }
}