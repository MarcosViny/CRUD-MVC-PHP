<?php
//Definir o Titulo da página
$pageTitle = "Editar Pessoa";
include_once 'partials/header.php';

require_once '../controller/PessoaController.php';
//Instanciar Controller
$pessoaController = new PessoaController();

//Receber dados da pessoa seleciona
$results = $pessoaController->selecionarPorId();
?>

<body>

    <div class="container">
        <form class="standard-form" action="../index.php?acao=atualizar" method="POST">
            <h1>Editar Dados da Pessoa</h1>

            <?php foreach ($results as $result) { ?>
                <input type="hidden" value="<?php echo $result['id'] ?>" name="id" required />

                <div class="input-group">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" value="<?= $result['nome'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="cargo">Cargo: </label>
                    <input type="text" name="cargo" value="<?= $result['cargo'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="setor">Setor: </label>
                    <input type="text" name="setor" value="<?= $result['setor'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" value="<?= $result['email'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone: </label>
                    <input type="number" name="telefone" value="<?= $result['telefone'] ?>" required>
                </div>

                <div class="input-group">
                    <input class="button" type="submit" name="bt_editar" value="Editar">
                </div>

            <?php } ?>
        </form>
    </div>

</body>

<?php
include_once 'partials/footer.php';
?>