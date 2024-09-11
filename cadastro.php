<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <h2 class="text-center mb-4">Cadastro</h2>
                <form action="cadastro.php" method="post">
                    <div class="form-group mb-3">
                        <label for="loginUser">Login</label>
                        <input type="text" class="form-control" id="loginUser" name="loginUser" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="senhaUser">Senha</label>
                        <input type="password" class="form-control" id="senhaUser" name="senhaUser" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomeUser">Nome</label>
                        <input type="text" class="form-control" id="nomeUser" name="nomeUser" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
include("db/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUser = mysqli_escape_string($conexao, $_POST["loginUser"]);
    $senhaUser = hash('sha256', $_POST["senhaUser"]);
    $nomeUser = mysqli_escape_string($conexao, $_POST["nomeUser"]);

    // Verifique se o login já existe
    $sql_check = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}'";
    $result_check = mysqli_query($conexao, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Login já cadastrado!";
    } else {
        // Insere os dados no banco de dados
        $sql_insert = "INSERT INTO tbusuarios (loginUser, senhaUser, nomeUser) VALUES ('{$loginUser}', '{$senhaUser}', '{$nomeUser}')";
        if (mysqli_query($conexao, $sql_insert)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro: " . mysqli_error($conexao);
        }
    }
}
?>


<form action="cadastro.php" method="post">
    <div class="form-group mb-3">
        <label for="loginUser">Login</label>
        <input type="text" class="form-control" id="loginUser" name="loginUser" required minlength="3" maxlength="20" pattern="[a-zA-Z0-9_]+" title="Somente letras, números e sublinhados são permitidos.">
    </div>
    <div class="form-group mb-3">
        <label for="senhaUser">Senha</label>
        <input type="password" class="form-control" id="senhaUser" name="senhaUser" required minlength="6">
    </div>
    <div class="form-group mb-3">
        <label for="nomeUser">Nome</label>
        <input type="text" class="form-control" id="nomeUser" name="nomeUser" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
</form>
