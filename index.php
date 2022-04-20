<?php
//Importar Controller Pessoa
require_once(__DIR__ . '/controller/PessoaController.php');


if (isset($_GET['acao'])) {
    $acao = strtoupper($_GET['acao']);

    switch ($acao) {
        case 'SALVAR':
            //Instanciar Controller
            $pessoaController = new PessoaController();

            //Chamar Método Salvar
            $pessoaController->salvar();

            //Redirecionar para View de Listagem
            header('Location: view/listarPessoas.php');
            break;

        case 'ATUALIZAR':
            //Instanciar Controller
            $pessoaController = new PessoaController();

            //Chamar Método Atualizar
            $pessoaController->atualizar();

            //Redirecionar para View de Listagem
            header('Location: view/listarPessoas.php');
            break;

        case 'DELETAR':
            //Instanciar Controller
            $pessoaController = new PessoaController();

            //Chamar Método Deletar
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $pessoaController->deletar($_GET['id']);
            }

            //Redirecionar para View de Listagem
            header('Location: view/listarPessoas.php');
            break;

        default:
            //Redirecionar para View de Listagem
            header('Location: view/listarPessoas.php');
            break;
    }
}
