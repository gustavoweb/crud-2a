<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
</head>
<body>
    <h1>Atualizar Usuário</h1>

    <?php
        include('../classes/Database.php');
        include('../classes/Usuario.php');
        $conexao = (new Database())->conectar();
        $usuario = new Usuario($conexao);

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $usuario->buscarUsuarioPorId($id);
    
            if ($user) {
        ?>

        <form action="processar_atualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['usu_id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $user['usu_nome']; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['usu_email']; ?>"><br>
            <label for="senha">Nova Senha (opcional):</label>
            <input type="password" name="senha"><br>
            <label for="foto_perfil">Foto de Perfil:</label>
            <input type="file" name="foto_perfil" accept="image/*" value="<?php echo $user['usu_foto_perfil']; ?>"><br>
            <input type="submit" value="Atualizar">
        </form>

        <?php
            } else {
                echo 'Usuário não encontrado.';
            }
        } else {
            echo 'Requisição inválida.';
        }
        ?>

</body>
</html>