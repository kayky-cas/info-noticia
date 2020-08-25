
<main>
    <?php
        if ($_SESSION['user']->cargo==2){
            echo '<a href="'.HOME_URI.'usuario/criar" class="btn btn-primary">ADICIONAR USUÁRIO(SÓ DISPONIVEIS PARA ADMINISTRADORES)</a>';
        }
    ?>
<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $conexao = Conexao::getInstance();
        $resultado = $conexao->query('SELECT * FROM usuario');
        echo '<h3>Só professores e administradores podem ver os usuarios cadastrados, e só administradores podem excluir contas</h3>';
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
                   <btn onclick="edit('.$usuarios->id_usuario.')" class="btn-primary" id="botaoAzul">
                        <span class = "glyphicon glyphicon-edit">
                   </btn>
                   <a href="'.HOME_URI.'usuario/deletar/'.$usuarios->id_usuario.'" class="btn-danger" id="botaoVerm">
                        <span class = "glyphicon glyphicon-trash">
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