<?php
require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';

$id = isset($_POST['idex']) ? $_POST['idex'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$acao = isset($_GET['ACAO']) ? $_GET['ACAO'] : null;

$novoUsuario = new ClassUsuario();
$novoUsuario->setIdUsuario($id);
$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);

$classUsuarioDAO = new ClassUsuarioDAO();

switch ($acao) {
    case 'cadastrarUsuario':
        $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
        if($usuario){
            header('Location:../index.php?MSG= cadastro realizado com sucesso!');
        } else {
            header('Location:../index.php?MSG= NÃO foi cadastrado!');
        }
        break;

    case 'alterarUsuario':
        $usuario = $classUsuarioDAO->alterarUsuario($novoUsuario);
        if($usuario){
            header('Location:../index.php?MSG= Cadastro foi alterado!');
        } else {
            header('Location:../index.php?MSG= NÃO foi possível alterar!');
        }
        break;
    
    case 'excluirUsuario':
        if(isset($_GET['idex'])){
            $idUsuario = $_GET['idex'];
            $us = $classUsuarioDAO->excluirUsuario($idUsuario);
            if($us == TRUE){
                header('Location:../index.php?MSG= Cadastro foi excluido!');
            } else {
                header('Location:../index.php?MSG= NÃO foi possível excluir!');
            }
        }
        break;

    default:
        break;
}