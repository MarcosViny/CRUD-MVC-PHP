<?php

require_once(__DIR__ . '/../model/PessoaModel.php');

class PessoaController
{
    private $pessoaModel;

    public function __construct()
    {
        $this->pessoaModel = new PessoaModel();
    }

    // Método que recebe os dados enviados pelo POST do Formulário
    private function validarParametros()
    {
        try {
            $dados = [];

            foreach ($_POST as $propiedade => $valor) {
                if (isset($_POST[$propiedade]) && !empty($_POST[$propiedade])) {
                    $dados[$propiedade] = $valor;
                } else {
                    throw new Exception("O campo " . $propiedade . " não foi preenchido", 1);
                }
            }

            return $dados;
        } catch (Exception $e) {
            echo "<p>Ocorreu um erro ao tentar validar os campos: " . $e->getMessage() . "</p>";
        }
    }

    /*     private function validarParametros()
    {
        try {
            $dadosValidados = [];

            if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                $dadosValidados['nome'] = $_POST['nome'];
            } else {
                throw new Exception("O campo nome não foi preenchido", 1);
            }

            if (isset($_POST['cargo']) && !empty($_POST['cargo'])) {
                $dadosValidados['cargo'] = $_POST['cargo'];
            } else {
                throw new Exception("O campo cargo não foi preenchido", 1);
            }

            if (isset($_POST['setor']) && !empty($_POST['setor'])) {
                $dadosValidados['setor'] = $_POST['setor'];
            } else {
                throw new Exception("O campo setor não foi preenchido", 1);
            }

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $dadosValidados['email'] = $_POST['email'];
            } else {
                throw new Exception("O campo email não foi preenchido", 1);
            }

            if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
                $dadosValidados['telefone'] = $_POST['telefone'];
            } else {
                throw new Exception("O campo telefone não foi preenchido", 1);
            }

            return $dadosValidados;
        } catch (Exception $e) {
            echo "<p>Ocorreu um erro ao tentar validar os campos: " . $e->getMessage() . "</p>";
        }
    } */

    private function criarTabela($listaPessoas)
    {
        foreach ($listaPessoas as $pessoa) {
            echo "<tr class='table__row'>";
            echo "<td class='table__item'>{$pessoa['id']}</td>";
            echo "<td class='table__item'>{$pessoa['nome']}</td>";
            echo "<td class='table__item'>{$pessoa['cargo']}</td>";
            echo "<td class='table__item'>{$pessoa['setor']}</td>";
            echo "<td class='table__item'>{$pessoa['email']}</td>";
            echo "<td class='table__item'>{$pessoa['telefone']}  </td>";
            echo "<td class='table__item'><a href='editarPessoa.php?id={$pessoa['id']}'><i class='fa-solid fa-pen-to-square fa-lg'></i></a></td>";
            echo "<td class='table__item'><a href='../index.php?acao=deletar&id={$pessoa['id']}'><i class='fas fa-trash-alt fa-lg'></i></a></td>";
            echo "</tr>";
        }
    }

    public function salvar()
    {
        //Receber Parametros Validados
        $dadosValidados = $this->validarParametros();

        //Inserir os Parametros Validados
        $this->pessoaModel->inserir($dadosValidados);
    }

    public function listar()
    {
        // Selecionar Todas Pessoas
        $listaPessoas = $this->pessoaModel->listarTodos();

        //Mostrar Tabela de Pessoas
        $this->criarTabela($listaPessoas);
    }

    public function selecionarPorId()
    {
        /* Verificar se o Id está preenchido */
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            //Receber Array com dados de uma pessoa
            $results = $this->pessoaModel->selecionarPorId($_GET['id']);

            //Retornar o Array
            return $results;
        } else {
            echo "O campo Id não foi preenchido corretamente";
        }
    }

    public function atualizar()
    {
        //Receber Parametros Validados do POST Editar
        $dadosValidados = $this->validarParametros();

        //Editar todos dados
        $this->pessoaModel->editar($dadosValidados);

    }

    public function deletar($id)
    {
        //Remover pessoa 
        $this->pessoaModel->deletar($id);
    }
}
