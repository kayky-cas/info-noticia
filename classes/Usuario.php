<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }


    public function index(){
        if (!isset($_SESSION['user'])){
            $this->login();
        }
        else {
            $this->listar();
        }

    }

    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }

    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

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

    public function exibir($id){
        echo "O id do usuario é".$id;
    }

    public function login(){
        include HOME_DIR."view/paginas/usuarios/login.php";
    }

    public function senha(){
        include HOME_DIR."view/paginas/usuarios/senha_padrao.php";
    }

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

    public function trocar_senha(){
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET senha = "'.md5($_POST['senhaTrocar']).'" WHERE id_usuario = '.$_SESSION['user']->id_usuario;
        if ($conexao->query($sql)){
            if ($_SESSION['user']->primeira_vez){
                $sql = $sql = 'UPDATE primeira_vez SET primeira_vezCol = '.'0'.' WHERE usuario_id_usuario = '.$_SESSION['user']->id_usuario;
                $conexao->query($sql);
                $_SESSION['user']->primeira_vez = 0;
            }
//            $msg['msg'] = "Senha alterada!";
//            $msg['class'] = "primary";
//            $_SESSION['msg'] = $msg;
        }
        else{
//            $msg['msg'] = "Ocorreu um erro ao alterar a senha!";
//            $msg['class'] = "danger";
//            $_SESSION['msg'] = $msg;
        }
    }

    public function autenticar(){
        $conexao = Conexao::getInstance();
        $email = $_POST['email'];
        $sql = 'SELECT senha FROM usuario WHERE email="'.$email.'"';
        $resultado = $conexao->query($sql);
        $senha = $resultado->fetch(PDO::FETCH_OBJ);
        if (!$senha) {
            $msg['msg'] = "Usuário ou senha invalidos!";
            $msg['class'] = "danger";
            $_SESSION['msg'] = $msg;
            $this->login();
        }
        else {
            if (md5($_POST['senha']) === $senha->senha){
                $sql = 'SELECT * FROM usuario WHERE email="'.$email.'"';
                $resultado = $conexao->query($sql);
                $_SESSION['user'] = $resultado->fetch(PDO::FETCH_OBJ);
                if ($_SESSION['user']->primeira_vez){
                    $this->senha();

                }
                header('Location:'.HOME_URI);
            }
            else{
                $this->login();
            }
        }
    }

    public function logout(){
        session_destroy();
        header('Location:'.HOME_URI);
    }

    public function editar($id){
        include 'editar.php'
    }
}