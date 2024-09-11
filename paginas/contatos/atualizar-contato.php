<header>
    <h3>Atualizar Contato</h3>
</header>

<?php

    $idContato = mysqli_real_escape_string($conexao,$_POST["idContato"]);

    $nomeContato = mysqli_real_escape_string($conexao,$_POST["nomeContato"]);

    $telefoneContato = mysqli_real_escape_string($conexao,$_POST["telefoneContato"]);

    $emailContato = mysqli_real_escape_string($conexao,$_POST["emailContato"]);

    $enderecoContato = mysqli_real_escape_string($conexao,$_POST["enderecoContato"]);

    $sexoContato = mysqli_real_escape_string($conexao,$_POST["sexoContato"]);
    
    $sql = "UPDATE dbcontatos SET 
    nomeContato = '{$nomeContato}',
    telefoneContato = '{$telefoneContato}',
    emailContato = '{$emailContato}',
    enderecoContato = '{$enderecoContato}',
    sexoContato = '{$sexoContato}'

    where idContato = {$idContato};
    ";

    // Executar a query

    mysqli_query($conexao, $sql) or 
    die("Erro ao executar consulta! " . mysqli_error($conexao));
    echo " O Registro foi atualizado com sucesso.";

?>