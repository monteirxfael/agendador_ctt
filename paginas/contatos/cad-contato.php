

<header> 
    <h3> <i class="bi bi-person"></i> Cadastro de Contatos</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>
        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome</label>
            <input class="form-control" type="text" name= "nomeContato" required>
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

         <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <input class="form-control" type="text" name= "telefoneContato"required>
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="emailContato">E-mail</label>
            <input class="form-control" type="email" name= "emailContato"required>
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <input class="form-control" type="text" name= "enderecoContato"required>
            <div class="valid-feedback">
                Correto!
            </div>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>

        <div class="mb-3 ">
            <label class="form-label" for="sexoContato">Sexo</label>
            <select class="form-control" name="sexoContato" id="sexoContato"required>
                <option selected > Selecione o sexo </option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option> 

            </select>
        </div>

        <div class="mb-3">
            <input class="btn btn-success"type="submit" value="Adicionar" name= "btnAdicionar">
        </div>
    </form>
</div>