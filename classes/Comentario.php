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
     * @param $stringComentario
     * @return void
     */
    public function salvar($stringComentario){
        list($id_noticia, $id_usuario, $comentario) = explode('¿',$stringComentario);
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO comentario (descricao, noticia_id_noticia, usuario_id_usuario) VALUES("'.$comentario.'","'.$id_noticia.'","'.$id_usuario.'")';
        if ($conexao->query($sql)){
            header("location:".HOME_URI."noticia/ver/".$id_noticia);
        }
        else {

        }
    }

    /**
     * @param null $id_noticia
     * @return bool
     */
    public function listar($id_noticia = null){
        $conexao = Conexao::getInstance();
        $sql = 'SELECT id_comentario ,descricao, (SELECT nome FROM usuario WHERE id_usuario = c.usuario_id_usuario) AS autor, (SELECT email FROM usuario WHERE id_usuario = c.usuario_id_usuario) AS email, (SELECT id_usuario FROM usuario WHERE id_usuario = c.usuario_id_usuario) AS id_usuario FROM comentario c WHERE noticia_id_noticia='.$id_noticia;
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
    public function deletar($id,$id_noticia){
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM comentario WHERE id_comentario='.$id;
        if ($conexao->query($sql));
        header("location:".HOME_URI."noticia/ver/".$id_noticia);
    }

}