<main>
    <div class="noticia">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div id="divTitulo<?php echo $noticia->id_noticia?>">
                    <h2 id="titulo<?php echo $noticia->id_noticia?>"><?php echo $noticia->titulo ?></h2>
                </div>
                <div id="divNoticiaB<?php echo $noticia->id_noticia?>">
                    <?php
                    if (isset($_SESSION['user'])){
                        if ($_SESSION['user']->id_usuario == $noticia->usuario_id_usuario||$_SESSION['user']->cargo == 2){
                            echo '<button id="botaoAzulNoticia'.$noticia->id_noticia.'" onclick="editNoticia('.$noticia->id_noticia.')" class="btn btn-info"><i class="material-icons">edit</i></button>';
                        }
                    }

                    ?>
                </div>

            </div>
            <div><img src="<?php echo $noticia->imagem?>" alt="imagemNoticia"></div>
            <div id="divDescricao<?php echo $noticia->id_noticia?>">
                <?php
                echo $noticia->descricao;
                ?>

            </div>
            <div class='data'><span class="label label-success"><?php echo $noticia->data ?></span><span class="label label-success autorNoticia"><?php echo "Por:".$noticia->nome_usuario ?></span></div>

        </div>
        <h4>Comentários:</h4>
    </div>


    <div id="divComentarios">

        <?php
            foreach ($noticia->comentarios AS $comentario){
                echo '
                <div class="divComentario">
                    <div id="divAutorComent">
                        <h5>'.$comentario->autor.'</h5>
                    </div>
                    <div id="divDescComent">
                        <p>'.$comentario->descricao.'</p>
                    </div>
                </div>
                      ';
            }
        ?>
    </div>
    <button onclick="comentar()" class="btn btn-primary">Comentar</button>
</main>
