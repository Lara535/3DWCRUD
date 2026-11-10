<?php
require_once 'Modelo/DAO/ClassUsuarioDAO.php';

$usuarioDAO = new ClassUsuarioDAO();
$usuarios = $usuarioDAO->listarusuarios();
?>

<h3>Lista de Usuários</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?php echo $u['idUsuario']; ?></td>
                    <td><?php echo htmlspecialchars($u['nome']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td>
                        <!-- Link para abrir a tela de edição passando o ID via GET -->
                        <a href="Visao/FormAltUsuario.php?idalt=<?php echo $u['idUsuario']; ?>">Alterar</a> | 

                        <!-- Link de exclusão -->
                        <a href="Controle/ControleUsuario.php?ACAO=excluirUsuario&idex=<?php echo $u['idUsuario']; ?>" 
                           onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Nenhum usuário cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>