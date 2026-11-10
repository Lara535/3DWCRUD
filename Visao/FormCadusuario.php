<form action="Controle/ControleUsuario.php?ACAO=cadastrarUsuario" method="post">
    <table>
        <tr>
            <td><label for="nome">Nome:</label></td>
            <td><input type="text" name="nome" id="nome" required placeholder="Digite o nome"></td>
        </tr>
        <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input type="email" name="email" id="email" required placeholder="Digite o e-mail"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <button type="submit">Cadastrar</button>
                <button type="reset">Limpar</button>
            </td>
        </tr>
    </table>
</form>