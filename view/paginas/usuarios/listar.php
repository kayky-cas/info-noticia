
<main>
<div class="alert alert-sm alert-primary" role="alert">
    Só professores e administradores podem ver os usuarios cadastrados, e só administradores podem excluir contas!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<h1>Usuários</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
            <?php
            if ($_SESSION['user']->cargo==2){
                echo '<th><a href="'.HOME_URI.'usuario/criar" id="adUser" class="btn btn-sm btn-light">ADICIONAR<br>USUÁRIO</a></th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
        $conexao = Conexao::getInstance();
        $resultado = $conexao->query('SELECT * FROM usuario');
        while($usuarios = $resultado->fetch(PDO::FETCH_OBJ)){
            switch ($usuarios->cargo){
                case 0:
                    $funcao = 'Aluno';
                    break;
                case 1:
                    $funcao = 'Professor';
                    break;
                case 2:
                    $funcao = 'Administrador';
                    break;
            }
            if ($usuarios->id_usuario == $_SESSION['user']->id_usuario||$_SESSION['user']->cargo!=2){
                $botoes = '';
            }
            else{
               $botoes =
                   '
                   <button onclick="edit('.$usuarios->id_usuario.')" class="btn btn-primary botaoAzul" id="botaoAzul'.$usuarios->id_usuario.'">
                        <i class="material-icons">edit</i>
                   </button>
                   <a href="'.HOME_URI.'usuario/deletar/'.$usuarios->id_usuario.'" class="btn btn-danger botaoVerm" id="botaoVerm'.$usuarios->id_usuario.'">
                        <i class="material-icons">delete</i>
                   </a>
                   ';
            }
            echo
            '
            <tr>
                <td>'.$usuarios->id_usuario.'</td>
                <td id="nome'.$usuarios->id_usuario.'">'.$usuarios->nome.'</td>
                <td id="email'.$usuarios->id_usuario.'">'.$usuarios->email.'</td>
                <td id="funcao'.$usuarios->id_usuario.'">'.$funcao.'</td>
                <td>
                    '.$botoes.'
				</td>
            </tr>
            ';
        }
    ?>
    </tbody>
</table>


</main>