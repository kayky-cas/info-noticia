
<main>
    <div class="alert alert-sm alert-primary" role="alert">
        Só professores e administradores podem adicionar notícias!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<h1>Notícias</h1>
    <?php
        if (isset($_SESSION['user'])){
            if ($_SESSION['user']->cargo>0){
                echo '<a href="'.HOME_URI.'noticia/criar" id="adNoti" class="btn btn-info">Adicionar Noticia</a>';
            }
        }
    ?>

<div class="row row-cols-1 row-cols-md-4">
<?php
if(isset($noticias)){
    foreach($noticias AS $noticia){
    ?>

        <div class="col mb-4 noti">
            <div class="card center" style="width: 18rem;">
                <img src="<?php echo $noticia->imagem?>" class="card-img-top imgNoti" alt="<?php echo $noticia->titulo ?>">
                <div class="card-body">
                    <div id="divTitulo<?php echo $noticia->id_noticia?>">
                        <h5 class="card-title" id="titulo<?php echo $noticia->id_noticia?>"><?php echo $noticia->titulo ?></h5>

                    </div>
                    <div id="divDescricao<?php echo $noticia->id_noticia?>">
                        <p class="card-text"><?php echo substr($noticia->descricao, 0, 40).'...' ?></p>
                    </div>
                    <a href="<?php echo HOME_URI?>noticia/ver/<?php echo $noticia->id_noticia?>" class="btn btn-primary btn-sm">ver mais</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?php echo $noticia->data?></small>
                    <small class="text-muted spanAutor"><?php echo $noticia->nome_usuario?></small>
                </div>

            </div>
        </div>


        <?php
    }
}
?>


</div>


</main>
