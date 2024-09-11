<?php
    include("db/conexao.php");
    session_start();
    
    if (isset($_SESSION["loginUser"]) && isset($_SESSION["senhaUser"]))  {
        $loginUser = $_SESSION["loginUser"];
        $senhaUser = $_SESSION["senhaUser"];

        // Executa a consulta SQL
        $sql = "SELECT * FROM tbusuarios WHERE loginUser ='{$loginUser}' AND senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql);

        // Verifica se a consulta foi executada corretamente
        if (!$rs) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        // Verifica se a consulta retornou algum resultado
        $linha = mysqli_num_rows($rs);
        if ($linha > 0) {
            // Extrai os dados
            $dados = mysqli_fetch_assoc($rs);
            
            // Define a variável de sessão nomeUser
            $_SESSION["nomeUser"] = $dados["nomeUser"];
            $nomeUser = $_SESSION["nomeUser"];
        } else {
            // Nenhum usuário encontrado, destrói a sessão e redireciona
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        }
    } else {
        header('Location: login.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/estilo-padrao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Sistema Agendador</title>
    
</head>
<body>
    <header class = "bg-dark">
    <div class="container">
        <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
            <a class = "navbar-brand"href="#">
                <img src="img/logo.png.png" alt="Logo" width="40" height="40">
            </a>



            <div class = "collapse navbar-collapse"  id="conteudoNavbarSuportado">
                <ul class = "navbar-nav mr-auto">
                    <li class = "nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                    <li class = "nav-item"><a class="nav-link" href="index.php?menuop=contatos">Contatos</a></li>
                </ul>

                <div class="navbar-nav w-100 justify-content-end">
                    <a href="logout.php" class="nav-link">
                        <i class="bi bi-person"></i>
                        <?php echo $nomeUser; ?> <br> Sair <i class="bi bi-box-arrow-right"></i>
                    </a>
                </div>
            </div>

        </nav>
    </div>

    </header>
    <main>
        <div class="container">
        <?php

        $menuop = (isset($_GET["menuop"]))? $_GET["menuop"] : "home";
         switch($menuop){
            case 'home':
                include ("paginas/home/home.php");
                break;
                case 'contatos':
                    include ("paginas/contatos/contatos.php");
                    break;
                    case 'cad-contato':
                        include ("paginas/contatos/cad-contato.php");
                        break;
                        case 'inserir-contato':
                            include ("paginas/contatos/inserir-contato.php");
                            break;

                            case 'editar-contato':
                                include ("paginas/contatos/editar-contato.php");
                                break;
                                case 'excluir-contato':
                                    include ("paginas/contatos/excluir-contato.php");
                                    break;
                                case 'atualizar-contato':
                                    include ("paginas/contatos/atualizar-contato.php");
                                    break;


         }
        ?>

</div> 
    </main> 

    <footer class="container-fluid bg-dark">

         <div class="text-center">Agendador de Contatos</div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script> 

</body>
</html>