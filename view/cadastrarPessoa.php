<?php
//Definir o Titulo da página
$pageTitle = "Cadastrar Pessoa";
include_once 'partials/header.php';
?>

<body>
    <div class="container">
        <form class="standard-form" action="../index.php?acao=salvar" method="POST">
            <h1>Formulário de Cadastro</h1>

            <div class="input-group">
                <label for="nome">Nome: </label>
                <input id="nome" type="text" name="nome" required>
            </div>
            <div class="input-group">
                <label for="cargo">Cargo: </label>
                <input id="cargo" type="text" name="cargo" required>
            </div>
            <div class="input-group">
                <label for="setor">Setor: </label>
                <input id="setor" type="text" name="setor" required>
            </div>
            <div class="input-group">
                <label for="email">E-mail: </label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="telefone">Telefone: </label>
                <input id="telefone" type="number" name="telefone" required>
            </div>

            <div class="input-group">
                <input class="button" type="submit" name="bt_cadastrar" value="Cadastrar">
            </div>


        </form>
    </div>


</body>

<?php
include_once 'partials/footer.php';
?>