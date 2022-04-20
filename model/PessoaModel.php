<?php

require_once 'Conexao.php';

class PessoaModel
{
    /* Propriedades */
    private $id;
    private $nome;
    private $cargo;
    private $setor;
    private $email;
    private $telefone;

    //Utilizar Setters para setar valores nas variáveis
    function setId($id)
    {
        $this->id = $id;
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }
    function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    function setSetor($setor)
    {
        $this->setor = $setor;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    //Utilizar Getters para manipular variáveis privadas 
    function getId()
    {
        return $this->id;
    }
    function getNome()
    {
        return $this->nome;
    }
    function getCargo()
    {
        return $this->cargo;
    }
    function getSetor()
    {
        return $this->setor;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getTelefone()
    {
        return $this->telefone;
    }
    // Obs: Esse código está servindo como exemplo, no momento Getters e Setters não estão sendo usados


    /* Manipulação do Banco de Dados */

    public function inserir($dadosValidados)
    {
        try {
            /* Utilizar Conexão */
            $minhaConexao = Conexao::getConexao();

            /* Preparar SQL */
            $sql = $minhaConexao->prepare("INSERT INTO pessoa (nome, cargo, setor, email, telefone) VALUES (:nome, :cargo, :setor, :email, :telefone)");

            /* Bindar as Variáveis - Vincula uma variável PHP a um espaço reservado com nome ou ponto de interrogação correspondente na instrução SQL*/
            $sql->bindParam("nome", $dadosValidados['nome']);
            $sql->bindParam("cargo", $dadosValidados['cargo']);
            $sql->bindParam("setor", $dadosValidados['setor']);
            $sql->bindParam("email", $dadosValidados['email']);
            $sql->bindParam("telefone", $dadosValidados['telefone']);

            /* Executar SQL */
            $sql->execute();
        } catch (PDOException $e) {
            echo "Entrou no Catch: " . $e->getMessage();
        }
    }

    public function editar($dadosValidados)
    {
        try {
            /* Utilizar Conexão */
            $minhaConexao = Conexao::getConexao();

            /* Preparar SQL */
            $sql = $minhaConexao->prepare("UPDATE pessoa SET nome = :nome, cargo = :cargo, setor = :setor, email = :email, telefone = :telefone WHERE id=:id");

            /* Bindar as Variáveis - Vincula uma variável PHP a um espaço reservado com nome ou ponto de interrogação correspondente na instrução SQL*/
            $sql->bindParam("id", $dadosValidados['id']);
            $sql->bindParam("nome", $dadosValidados['nome']);
            $sql->bindParam("cargo", $dadosValidados['cargo']);
            $sql->bindParam("setor", $dadosValidados['setor']);
            $sql->bindParam("email", $dadosValidados['email']);
            $sql->bindParam("telefone", $dadosValidados['telefone']);

            // Executar SQL
            $sql->execute();
        } catch (PDOException $e) {
            echo "Entrou no Catch: " . $e->getMessage();
        }
    }

    // Lógica para listar todos as pessoas do Banco de Dados
    public function listarTodos()
    {
        try {
            /* Utilizar Conexão */
            $minhaConexao = Conexao::getConexao();

            /* Preparar SQL */
            $sql = $minhaConexao->prepare("SELECT * FROM pessoa");

            /* Executar SQL */
            $sql->execute();

            /* Criar Array com Todos Registros do Banco de Dados */
            $resultados = $sql->fetchAll();

            /* Retornar Array com Dados do Banco de Dados */
            return $resultados;
        } catch (PDOException $e) {
            echo "Entrou no Catch: " . $e->getMessage();
        }
    }

    // Lógica para listar as pessoas do Banco de Dados por Id
    public function selecionarPorId($id)
    {
        try {
            /* Utilizar Conexão */
            $minhaConexao = Conexao::getConexao();

            /* Preparar SQL */
            $sql = $minhaConexao->prepare("SELECT * FROM pessoa WHERE id = :id");

            //Bind/Vincular parâmetro Id
            $sql->bindParam(":id", $id);

            // Executar SQL
            $sql->execute();

            /* Criar Array com Todos Registros do BD */
            $results = $sql->fetchAll();

            return $results;
        } catch (PDOException $e) {
            echo "Entrou no Catch: " . $e->getMessage();
        }
    }

    public function deletar($id)
    {
        try {
            /* Utilizar Conexão */
            $minhaConexao = Conexao::getConexao();

            /* Seleciona Pessoa pelo Id */
            $sql = $minhaConexao->prepare("DELETE FROM pessoa WHERE id=:id");

            /* Bindar as Variáveis - Vincula uma variável PHP a um espaço reservado com nome ou ponto de interrogação correspondente na instrução SQL*/
            $sql->bindParam("id", $id);

            // Executar SQL
            $sql->execute();
        } catch (PDOException $e) {
            echo "Entrou no Catch: " . $e->getMessage();
        }
    }
}
