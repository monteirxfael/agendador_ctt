<?php

$idContato = $_GET["idContato"];
$sql = "SELECT * FROM dbcontatos WHERE idContato = {$idContato}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados ". mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);

?>


<header>
    <h3>Editar Contato</h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-contato" method="post" novalidate>
        <div class="mb-3">
            <label  class="form-label" for="idContato">ID</label>
            <input class="form-control" type="text" name= "idContato" value = "<?=$dados["idContato"]?>" readonly>  
        </div>

        <div class="mb-3">
            <label  class="form-label" for="nomeContato">Nome</label>
            <input class="form-control" type="text" name= "nomeContato" required value = "<?=$dados["nomeContato"]?>">
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

         <div class="mb-3">
            <label  class="form-label" for="telefoneContato">Telefone</label>
            <input class="form-control" type="text" name= "telefoneContato" required value = "<?=$dados["telefoneContato"]?>">
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3">
            <label  class="form-label" for="emailContato">E-mail</label>
            <input class="form-control" type="email" name= "emailContato" required value = "<?=$dados["emailContato"]?>">
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3">
            <label  class="form-label" for="enderecoContato">Endereço</label>
            <input class="form-control" type="text" name= "enderecoContato" required value = "<?=$dados["enderecoContato"]?>">
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3">
            <label for="sexoContato">Sexo</label>
            <select class="form-control" name="sexoContato" id="sexoContato">
                <option selected> Selecione o sexo </option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option> 

            </select>
        </div>

        <div class="mb-3">
            <input class="btn btn-warning"type="submit" value="Atualizar" name= "btnAtualizar">
        </div>
    
        </div>
    </form>
</div>