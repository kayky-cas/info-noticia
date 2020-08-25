<?php

/**
 * Class Comentario
 */
class Comentario{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $comentario;
    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $noticia;
    /**
     * @var
     */
    private $usuario;

    /**
     * @param $id
     */
    public function setId($id){
        $this->id=$id;
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param $comentario
     */
    public function setComentario($comentario){
        $this->comentario=$comentario;
    }

    /**
     * @return mixed
     */
    public function getComentario(){
        return $this->comentario;
    }

    /**
     * @param $data
     */
    public function setDatad($data){
        $this->data=$data;
    }

    /**
     * @return mixed
     */
    public function getData(){
        return $this->data;
    }

    /**
     * @param $noticia
     */
    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }

    /**
     * @return mixed
     */
    public function getNoticia(){
        return $this->noticia;
    }

    /**
     * @param $usuario
     */
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }

    /**
     * @return mixed
     */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * @param $id_noticia
     * @param $comentario
     * @param $id_usuario
     * @return bool
     */
    public function salvar($id_noticia, $comentario, $id_usuario){
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO comentario (id_comentario, comentario, noticia_id, usuario_id) VALUES(0,"'.$comentario.'","'.$id_noticia.'","'.$id_usuario.'")';
        if ($conexao->query($sql)){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @param null $id_noticia
     * @return bool
     */
    public function listar($id_noticia = null){
        $conexao = Conexao::getInstance();
        $sql = 'SELECT comentario, (SELECT nome FROM usuario WHERE id_usuario = c.id_usuario) AS nome_usuario FROM comentario c';
        if ($id_noticia) {
            $sql .= 'WHERE id_noticia = '.$id_noticia;
        }
        $resultado = $conexao->query($sql);
        while ($item = $resultado->fetch(PDO::FETCH_OBJ)) {
            $comentarios[] = $item;
        }

        if (isset($comentarios)){
            return $comentarios;
        }
        else {
            return false;
        }
    }

}