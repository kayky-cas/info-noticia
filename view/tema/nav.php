
<nav>
	<ul>
		<li><a href="<?php echo HOME_URI;?>">Início</a></li>
        <?php
            if (isset($_SESSION['user'])){
                if ($_SESSION['user']->cargo!=0){
                    echo '<li><a href="'.HOME_URI.'usuario">Usuários</a></li>';

                }
            }


        ?>
		<li><a href="<?php echo HOME_URI;?>noticia">Notícia</a></li>
		<li><a href="<?php echo HOME_URI;?>contato">Contato</a></li>

	</ul>
</nav>
