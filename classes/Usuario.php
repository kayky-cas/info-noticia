<?php

/**
 * Class Usuario
 */
class Usuario{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var String
     */
    private $nome;
    /**
     * @var String
     */
    private $email;
    /**
     * @var String
     */
    private $senha;

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
     * @param $nome
     */
    public function setNome($nome){
        $this->nome=$nome;
    }

    /**
     * @return mixed
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @param $email
     */
    public function setEmail($email){
        $this->email=$email;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param $senha
     */
    public function setSenha($senha){
        $this->senha=$senha;
    }

    /**
     * @return mixed
     */
    public function getSenha(){
        return $this->senha;
    }


    /**
     *
     */
    public function index(){

        if (!isset($_SESSION['user'])){
            $this->login();
        }
        else if ($_SESSION['user']->cargo>0){
            $this->listar();
        }

    }

    /**
     *
     */
    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }

    /**
     *
     */
    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

    /**
     *
     */
    public function salvar(){
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO usuario (nome, email, senha, cargo) VALUES ("'.$_POST['nomeSalvar'].'","'.$_POST['emailSalvar'].'","'.md5('basico_info').'",'.$_POST['funcaoSalvar'].')';
        if ($conexao->query($sql)){
//            $msg['msg'] = "Usuário salvo!";
//            $msg['class'] = "primary";
//            $_SESSION['msg'] = $msg;
        }
        else{
//            $msg['msg'] = "Ocorreu um erro ao salvar usuário!";
//            $msg['class'] = "danger";
//            $_SESSION['msg'] = $msg;
        }
    }

    /**
     * @param $id
     */
    public function exibir($id){
        echo "O id do usuario é".$id;
    }

    /**
     *
     */
    public function login(){
        include HOME_DIR."view/paginas/usuarios/login.php";
    }

    /**
     *
     */
    public function senha(){
        include HOME_DIR."view/paginas/usuarios/senha_padrao.php";
    }

    /**
     * @param $id
     */
    public function deletar($id){
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM usuario WHERE id_usuario='.$id;
        if ($conexao->query($sql)){
//            $msg['msg'] = "Usuário deletado!";
//            $msg['class'] = "primary";
//            $_SESSION['msg'] = $msg;
        }
        else{
//            $msg['msg'] = "Ocorreu um erro ao deletar o usuário!";
//            $msg['class'] = "danger";
//            $_SESSION['msg'] = $msg;
        }
        $this->listar();
    }

    /**
     *
     */
    public function trocar_senha(){
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET senha = "'.md5($_POST['senhaTrocar']).'" WHERE id_usuario = '.$_SESSION['user']->id_usuario;
        if ($conexao->query($sql)){
            $resultado = $conexao->query('SELECT primeira_vezCol FROM primeira_vez WHERE usuario_id_usuario = '.$_SESSION['user']->id_usuario);
            $primeira_vez = $resultado->fetch(PDO::FETCH_OBJ);
            if ($primeira_vez->primeira_vezCol){
                $sql = $sql = 'UPDATE primeira_vez SET primeira_vezCol = '.'0'.' WHERE usuario_id_usuario = '.$_SESSION['user']->id_usuario;
                if ($conexao->query($sql)){

                }
            }
            header('Location:'.HOME_URI);
        }
        else{
//            $msg['msg'] = "Ocorreu um erro ao alterar a senha!";
//            $msg['class'] = "danger";
//            $_SESSION['msg'] = $msg;
        }
    }

    /**
     *
     */
    public function autenticar(){
        $conexao = Conexao::getInstance();
        $email = $_POST['email'];
        $sql = 'SELECT senha FROM usuario WHERE email="'.$email.'"';
        $resultado = $conexao->query($sql);
        $senha = $resultado->fetch(PDO::FETCH_OBJ);
        if (!$senha) {
            if (!isset($_SESSION['msg'])){
//                $mensagem = new stdClass();
//                $mensagem->mensagem = 'Email ou senha invalidos!';
//                $mensagem->display = 'displayBlock';
//                $mensagem->tipo = 'danger';
//                $_SESSION['msg'] = $mensagem;

            }
            $this->login();
        }
        else {
            if (md5($_POST['senha']) === $senha->senha){
                $sql = 'SELECT * FROM usuario WHERE email="'.$email.'"';
                $resultado = $conexao->query($sql);
                $_SESSION['user'] = $resultado->fetch(PDO::FETCH_OBJ);
                $resultado = $conexao->query('SELECT primeira_vezCol FROM primeira_vez WHERE usuario_id_usuario = '.$_SESSION['user']->id_usuario);
                $primeira_vez = $resultado->fetch(PDO::FETCH_OBJ);
                if ($primeira_vez->primeira_vezCol == '1'){
                    $this->senha();

                }
                else{
                    header('Location:'.HOME_URI);

                }
            }
            else{
                $this->login();
            }
        }
    }

    /**
     *
     */
    public function logout(){
        session_destroy();
        $this->login();
    }

    /**
     * @param $usuarioString
     */
    public function editar($usuarioString){
        list($id, $nome, $email, $funcao) = explode('!', $usuarioString);
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET nome = "'.$nome.'", email = "'.$email.'", cargo = "'.$funcao.'" WHERE id_usuario = '.$id;
        if ($conexao->query($sql));
        header("location:".HOME_URI."usuario");
    }
}


