<header>
    <h3>Inserir Contato</h3>
</header>

<?php


    $nomeContato = mysqli_real_escape_string($conexao,$_POST["nomeContato"]);

    $telefoneContato = mysqli_real_escape_string($conexao,$_POST["telefoneContato"]);

    $emailContato = mysqli_real_escape_string($conexao,$_POST["emailContato"]);

    $enderecoContato = mysqli_real_escape_string($conexao,$_POST["enderecoContato"]);

    $sexoContato = mysqli_real_escape_string($conexao,$_POST["sexoContato"]);
    
    $sql = "INSERT INTO dbcontatos (nomeContato, telefoneContato, emailContato, enderecoContato, sexoContato) 
    VALUES(
        '{$nomeContato}', 
        '{$telefoneContato}', 
        '{$emailContato}', 
        '{$enderecoContato}', 
        '{$sexoContato}'
    )";

    // Executar a query

    mysqli_query($conexao, $sql) or 
    die("Erro ao executar consulta! " . mysqli_error($conexao));
    echo " O contato foi adicionado com sucesso.";

?>