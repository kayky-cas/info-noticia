<main>
    <div id="divForm">

        <form form action="<?php echo HOME_URI;?>noticia/incluir" method="POST">
            <legend>Criar Noticia</legend>
            <div class="form-group">
                <label for="inputTitulo">Título da Notícia</label>
                <input type="text" name="titulo" class="form-control" id="inputTitulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="inputImagem">URL da Imagem</label>
                <input type="url" name="imagem" class="form-control" id="inputImagem" placeholder="www.imagem.com.br/...">
            </div>
            <div class="form-group">
                <label for="inputDescricao">Texto</label>
                <textarea class="form-control" name="descricao" id="inputDescricao" rows="3"></textarea>
            </div>
            <div id="divBut">
                <button type="submit" class="btn btn-info btn-block">Enviar</button>
            </div>
        </form>
    </div>
</main>