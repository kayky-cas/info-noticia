<?php
    if (isset($_SESSION['msg'])){
        $display = $_SESSION['msg']->display;
        $_SESSION['msg']->display = 'displayNone';
        echo '<div class="alert alert-'.$_SESSION['msg']->tipo.' alerta '.$display.' role="alert">
                '.$_SESSION['msg']->menssagem.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               </div>';
    }



