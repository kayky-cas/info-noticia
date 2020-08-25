<html>
<main>
<div class="panel-heading"><h1>Notícias</h1></div>

<?php
if(isset($noticias)){
    foreach($noticias AS $noticia){
    ?>
    <a href="<?php echo HOME_URI?>noticia/ver/<?php echo $noticia->id_noticia?>" class="aNoticia" id="noticia<?php echo $noticia->id_noticia?>">
    <div class="noticia">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div id="divTitulo<?php echo $noticia->id_noticia?>">
                    <h2 id="titulo<?php echo $noticia->id_noticia?>"><?php echo $noticia->titulo ?></h2>
                </div>
                <div id="divNoticiaB<?php echo $noticia->id_noticia?>">
                <?php
                    if ($_SESSION['user']->id_usuario == $noticia->usuario_id_usuario||$_SESSION['user']->cargo == 2){
                        echo '<button id="botaoAzulNoticia'.$noticia->id_noticia.'" onclick="editNoticia('.$noticia->id_noticia.')" class="btn btn-info">Editar  <span class = "glyphicon glyphicon-edit"></button>';
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
            <div class='data'><span class="label label-success"><?php echo $noticia->data ?></span><span class="label label-success floatRight"><?php echo "Por:".$noticia->nome_usuario ?></span></div>

        </div>
    </div>
    </a>

        <?php
    }
}
?>
    

</main>
</html>