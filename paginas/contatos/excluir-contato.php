
<header>
    <h3>Excluir Contato</h3>
</header>

<?php  
    $idContato = mysqli_real_escape_string($conexao, $_GET['idContato']);
    $sql = "DELETE FROM dbcontatos WHERE idContato = '{$idContato}'";
    mysqli_query($conexao, $sql) or die ("Erro ao excluir contato." . mysqli_error($conexao));
    echo "<p>Contato excluído com sucesso.</p>";
?>