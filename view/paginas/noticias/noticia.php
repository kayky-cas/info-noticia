<?php
    if (isset($_SESSION['user'])){
        if ($_SESSION['user']->id_usuario == $noticia->id_usuario || $_SESSION['user']->cargo == 2){
            $botaoEdit = '<button onclick="editNoticia('.$noticia->id_noticia.')" class="btn btn-primary"><i class="material-icons">edit</i></button>';
        }
        else{
            $botaoEdit = '';
        }
    }
    else{
        $botaoEdit = '';
    }

?>
<main>
    <div class="alert alert-sm alert-primary" role="alert">
        Apenas o criador da notícia ou um Administrador podem edita-la.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card mb-3 noticia">
        <img src="<?php echo $noticia->imagem?>" class="card-img-top noticiaImagem" alt="<?php echo $noticia->titulo?>">
        <div class="card-body">
            <div id="divTitulo">
                <h5 id="titulo" class="card-title"><?php echo $noticia->titulo?></h5>
                <?php echo $botaoEdit?>
            </div>
            <div id="divDescricao">
                <p class="card-text" id="descricao"><?php echo $noticia->descricao?></p>

            </div>
            <div id="divNoticiaB">

            </div>
            <p class="card-text">
                <small class="text-muted"><?php echo $noticia->data?></small>
                <small class="text-muted spanAutor"><?php echo $noticia->nome_usuario?></small>
            </p>
        </div>
        <?php
            if ($noticia->comentarios!=false){
                echo '<button id="botaoComentario" onclick="mostrarComentarios()" class="btn btn-lg btn-dark">Exibir comentários ('.count($noticia->comentarios).')</button>';
            }
        ?>


    </div>
    <div id="divComentarios">
        <div class="alert alert-sm alert-primary" role="alert">
            Apenas o criador do comentário ou um Administrador podem excluí-lo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php

            foreach ($noticia->comentarios AS $comentario){
                if (isset($_SESSION['user'])){
                    if ($_SESSION['user']->id_usuario == $comentario->id_usuario || $_SESSION['user']->cargo == 2){
                        $botao = '<a href="'.HOME_URI.'comentario/deletar/'.$comentario->id_comentario.'/'.$noticia->id_noticia.'"><i class="material-icons">delete</i></a>';
                    }
                    else{
                        $botao = '';
                    }

                }
                else{
                    $botao = '';
                }
                echo '
                <div class="divComentario">
                    <div id="divAutorComent">
                        <h5>'.$comentario->autor.'</h5>
                        
                        <small class="text-muted">'.$comentario->email.'</small>
                        '.$botao.'
                    </div>
                    <div id="divDescComent">
                        <p>'.$comentario->descricao.'</p>
                    </div>
                </div>
                <br>
                      ';
            }
        ?>
        <br>

    </div>
    <?php
    if (isset($_SESSION['user'])){
        ?>
        <div id="adicionarComentario">
            <button onclick="comentar(<?php echo $noticia->id_noticia?>, <?php echo $_SESSION['user']->id_usuario;?>)" class="btn btn-primary btn-block">Comentar</button>
        </div>
        <?php
    }

    ?>

</main>
