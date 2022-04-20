<?php
//Definir o Titulo da página
$pageTitle = "Lista de Pessoas";
include_once 'partials/header.php';

//Importar Controller Pessoa
require_once(__DIR__ . '/../controller/PessoaController.php');
//Instanciar Controller
$pessoaController = new PessoaController();
?>

<body>
    <div class="container">
        <h1>CRUD - Lista de Usuários</h1>

        <div class="button-wrapper">
            <input class="button" type="submit" name="bt_cadastrar" value="Cadastrar" onclick="javascript:window.self.location='cadastrarPessoa.php'">
        </div>

        <table class="table table-responsive">
            <thead class="table__head">
                <tr class="table__row">
                    <th class="table__header">ID</th>
                    <th class="table__header">Nome</th>
                    <th class="table__header">Cargo</th>
                    <th class="table__header">Setor</th>
                    <th class="table__header">E-mail</th>
                    <th class="table__header">Telefone</th>
                    <th class="table__header">Editar</th>
                    <th class="table__header">Remover</th>
                </tr>
            </thead>
            <tbody class="table__body">
                <!-- Chamar método para listar todas pessoas do Banco de Dados  -->
                <?php
                $pessoaController->listar();
                ?>
            </tbody>
        </table>
    </div>

</body>

<?php
include_once 'partials/footer.php';
?>