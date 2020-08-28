<main>
    <div class="alert alert-sm alert-primary" role="alert">
        Usuário Administrador<br>
        email: candido@cimol.com.br
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <br>senha padrão para todas as contas: basico_info
    </div>
    <div id="divForm">

        <form action="<?php echo HOME_URI;?>usuario/autenticar" method="POST">
            <legend>Login</legend>
            <div class="form-group">
                <label for="inputEmail">Endereço de Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Senha">
            </div>
            <div id="divBut">
                <button type="submit" class="btn btn-info btn-block">Enviar</button>

            </div>
        </form>
    </div>


</main>