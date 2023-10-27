<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Inclua seus arquivos PHP (Database.php e Usuario.php) e crie uma instância da classe Usuario.
    include('../classes/Database.php');
    include('../classes/Usuario.php');
    $conexao = (new Database())->conectar();
    $usuario = new Usuario($conexao);

    // Recupere os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $novaSenha = $_POST['senha'];

    // Verifique se o usuário com o ID especificado existe no banco de dados.
    $user = $usuario->buscarUsuarioPorId($id);

    if ($user) {
        // Atualize os dados do usuário
        if (!empty($novaSenha)) {
            // Se uma nova senha foi fornecida, hash ela e atualize-a
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $usuario->atualizarUsuario($id, $nome, $email, $senhaHash);
        } else {
            // Se nenhuma nova senha foi fornecida, atualize apenas nome e email
            $usuario->atualizarUsuarioSemSenha($id, $nome, $email);
        }
        echo 'Usuário atualizado com sucesso.';
    } else {
        echo 'Usuário não encontrado.';
    }
} else {
    echo 'Requisição inválida.';
}
?>
