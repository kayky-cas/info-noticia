<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="<?php echo HOME_URI;?>">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuários
                </a>
                <div class="dropdown-menu text-dark" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                        if (isset($_SESSION['user'])){
                            if ($_SESSION['user']->cargo!=0){

                                echo '<a class="dropdown-item" href="'.HOME_URI.'usuario">Lista de Usuários</a>';

                            }
                            echo '
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Usuário</h6>
                            <a class="dropdown-item" href="#">'.$_SESSION['user']->nome.'</a>
                            <a class="dropdown-item btn-danger" href="'.HOME_URI.'usuario/logout">Logout</a>
                            ';
                        }
                        else {
                            echo '<a class="dropdown-item" href="'.HOME_URI.'usuario/login">Login</a>';
                        }

                    ?>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="<?php echo HOME_URI;?>noticia">Notícias</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="<?php echo HOME_URI;?>contato">Contato</a>
            </li>

        </ul>
    </div>
</nav>





