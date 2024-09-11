<?php
    include "./db/conexao.php";

    $msg_erro = "";

    if ( isset($_POST["loginUser"]) && isset($_POST["senhaUser"]) ) {
        $loginUser = mysqli_escape_string($conexao, $_POST["loginUser"]);
        $senhaUser = hash('sha256',$_POST["senhaUser"]);

        $sql = "SELECT * FROM tbusuarios WHERE loginUser ='{$loginUser}' and senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if ($linha != 0) {
            session_start();
            $_SESSION["loginUser"] = $loginUser;
            $_SESSION["senhaUser"] = $senhaUser;
            $_SESSION["nomeUser"] = $dados = ["nomeUser"];

            header('Location: index.php');
            
        } else {
            $msg_erro = "<div class ='alert alert-danger mt-3'>
            <p> Usuário ou senha inválidos! </p>
            </div>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Login Agendador</title>
</head>
<body class="bg-dark">
    
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow roundead rounded">
            <div class="row justify-content-center mb-10 ">
                <img src="./img/banner.png.png" alt="Agendador" height="150px" width="10px">
            </div>
            <form  class="needs-validation" action="login.php" method="post" novalidate>
                <div class="form-group mb-4">
                    <label for="LoginUser">Login</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" class="form-control" id="LoginUser" name="loginUser" required>
                        <div class="invalid-feedback">
                            Informe Username
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="senhaUser">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key-fill"></i>
                        </span>
                        <input type="password" class="form-control" id="senhaUser" name="senhaUser" required>
                        <div class="invalid-feedback">
                            Informe Password
                        </div>
                    </div>
                    <?php echo $msg_erro;?>
                </div>
                <button class="btn btn-success w-100"> <i class="bi bi-box-arrow-in-right"></i> Entrar</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/validation.js"></script> 
</body>
</html>