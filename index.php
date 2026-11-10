<!DOCTYPE html>
<html lang="pt-br">
<?php
$msg = @$_GET['MSG'];
if($msg != null || $msg != ""){
    echo "<script>alert('$msg');</script>";
}
echo "</div>";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Sistema de Cadastro de Alunos</h1>
    <?php
    include 'Visao/FormCadUsuario.php';
    echo "<hr>";
    include 'Visao/ListarUsuario.php';
    ?>
</body>
</html>