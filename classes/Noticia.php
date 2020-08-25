<?php
/**
 * Class Noticia
 * Esta classe faz parte do aplicativo de noticias desenvolvido em aula
 * @version 0.1
 * @access public
 * @see 17/07/2020
 */

class Noticia{
    /**
     * propriedade referente ao atributo identificador
     * @name $id
     */
    private $id;
    private $titulo;
    private $descricao;
    private $comentarios;
    private $data;
    private $usuario;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param String $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return String
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param String $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return Comentario[]
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param Comentario[] $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * @return String
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param String $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }



    public function index(){
        $this->listar();
    }

    public function alterar($noticiaString){
        list($id, $titulo, $descricao) = explode('¿', $noticiaString);
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE noticia SET titulo = "'.$titulo.'", descricao = "'.$descricao.'" WHERE id_noticia ='.$id;
        if ($conexao->query($sql)){
            header("location:".HOME_URI."noticia");

        }
        else{
            echo "erro";
        }
    }

    public function listar(){
        $conexao=Conexao::getInstance();
        $sql="SELECT id_noticia, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id_usuario=noticia.usuario_id_usuario)AS nome_usuario,
        usuario_id_usuario,
        imagem
        FROM noticia
        ORDER BY id_noticia DESC LIMIT 5";
        
        $resultado=$conexao->query($sql);
        $noticias=null;

        while($noticia=$resultado->fetch(PDO::FETCH_OBJ)){
            $noticias[]=$noticia;
        }
        
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }

    public function ver($id){
        $conexao=Conexao::getInstance();
        $sql="SELECT id_noticia, titulo, descricao, DATE_FORMAT(data, '%d/%m/%Y') AS data,
        (SELECT nome FROM usuario WHERE id_usuario=n.usuario_id_usuario)AS nome_usuario,
        usuario_id_usuario,
        imagem
        FROM noticia n
        WHERE id_noticia=".$id;

        $resultado=$conexao->query($sql);
        $noticia=$resultado->fetch(PDO::FETCH_OBJ);

        include "Comentario.php";
        $comentario = new Comentario();
        $noticia->comentarios = $comentario->listar($id);

        include HOME_DIR."view/paginas/noticias/noticia.php";
    }
    
    public function comentar(){
        include "Comentario.php";
        $comentario = new Comentario();
        if ($comentario->salvar($_POST['id_noticia'], $_POST['comentario'], $_POST['id_usuario'])){
            $msg['msg'] = "Comentário adicionado!";
            $msg['class'] = "success";
            $_SESSION['msg'] = $msg;
        }
        else {
            $msg['msg'] = "Falha ao adicionar comentário!";
            $msg['class'] = "danger";
            $_SESSION['msg'] = $msg;
        }
        header("location:".HOME_URI."noticia/ver/".$_POST['id_noticia']);
    }

}


?>