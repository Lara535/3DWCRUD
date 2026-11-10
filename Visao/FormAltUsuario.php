<?php
require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';

$idUsuario = isset($_GET['idalt']) ? $_GET['idalt'] : null;

$usuarioDAO = new ClassUsuarioDAO();
$usuario = $usuarioDAO->buscarusuario($idUsuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h1>Alterar Usuário</h1>

    <?php if ($usuario): ?>
        <form action="../Controle/ControleUsuario.php?ACAO=alterarUsuario" method="post">
            <!-- Campo oculto para enviar o ID do usuário ao controller -->
            <input type="hidden" name="idex" value="<?php echo $usuario->getIdUsuario(); ?>">

            <table>
                <tr>
                    <td><label for="nome">Nome:</label></td>
                    <td>
                        <input type="text" name="nome" id="nome" 
                               value="<?php echo htmlspecialchars($usuario->getNome()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">E-mail:</label></td>
                    <td>
                        <input type="email" name="email" id="email" 
                               value="<?php echo htmlspecialchars($usuario->getEmail()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit">Salvar Alteração</button>
                        <a href="../index.php"><button type="button">Cancelar</button></a>
                    </td>
                </tr>
            </table>
        </form>
    <?php else: ?>
        <p>Usuário não encontrado!</p>
        <a href="../index.php">Voltar</a>
    <?php endif; ?>
</body>
</html>