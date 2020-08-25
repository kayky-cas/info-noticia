<?php

/**
 * Class Conexao
 * Classe responsavel por estabelecer uma conexao com o banco de dados
 * @author Cândido
 * @version 0.1
 */
class Conexao {

    /**
     * @var
     */
    public static $instance;

    /**
     *
     * @return PDO
     */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance =new PDO(SGBD.":host=".HOST_DB.";dbname=".DB."",USER_DB,PASS_DB);
        }
        return  self::$instance;
    }
}