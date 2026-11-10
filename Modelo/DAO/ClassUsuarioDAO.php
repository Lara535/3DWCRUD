<?php
require_once 'Conexao.php';

class ClassUsuarioDAO {

    public function cadastrar(ClassUsuario $cadastrarUsuario){
        try {
            $pdo = Conexao::getInstance();
            $sql = 'INSERT INTO usuario (nome, email) VALUES (?,?)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUsuario->getNome());
            $stmt->bindValue(2, $cadastrarUsuario->getEmail());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc){
            echo "Erro ao cadastrar: " . $exc->getMessage();
            return FALSE;
        }
    }

    public function buscarusuario($idUsuario){
        try {
            $usuario = new ClassUsuario();
            $pdo = Conexao::getInstance();
            $sql = 'SELECT idUsuario, nome, email FROM usuario WHERE idUsuario = :id LIMIT 1';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idUsuario);
            $stmt->execute();
            
            $usuarioAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($usuarioAssoc) {
                $usuario->setIdUsuario($usuarioAssoc['idUsuario']);
                $usuario->setNome($usuarioAssoc['nome']);
                $usuario->setEmail($usuarioAssoc['email']);
                return $usuario;
            }
            return null;
        } catch(PDOException $exc){
            echo 'Erro ao buscar usuário: ' . $exc->getMessage();
        }
    }

    public function listarusuarios(){
        try {
            $pdo = Conexao::getInstance();
            $sql = 'SELECT * FROM usuario';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc){
            echo "Erro ao listar: " . $exc->getMessage();
        }
    }

    public function alterarUsuario(ClassUsuario $alterarUsuario){
        try {
            $pdo = Conexao::getInstance();
            $sql = 'UPDATE usuario SET nome=?, email=? WHERE idUsuario=?';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarUsuario->getNome());
            $stmt->bindValue(2, $alterarUsuario->getEmail());
            $stmt->bindValue(3, $alterarUsuario->getIdUsuario());
            $stmt->execute();
            return TRUE;
        } catch(PDOException $exc){
            echo "Erro ao alterar: " . $exc->getMessage();
            return FALSE;
        }
    }

    public function excluirUsuario($idUsuario){
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuario WHERE idUsuario = :idUsuario";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idUsuario', $idUsuario);
            $stmt->execute();
            return TRUE;
        } catch(PDOException $exc){
            echo "Erro ao excluir: " . $exc->getMessage();
            return FALSE;
        }
    }        
}