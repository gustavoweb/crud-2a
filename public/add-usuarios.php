<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Usuário</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>

    <form action="adicionar.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="foto_perfil">Foto de Perfil:</label>
        <input type="file" name="foto_perfil" accept="image/*"><br>


        <input type="submit" value="Cadastrar">
    </form>

    <a href="index.php">Voltar para a lista de usuários</a>
</body>
</html>
