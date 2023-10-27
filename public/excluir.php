<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Inclua seus arquivos PHP (Database.php e Usuario.php) e crie uma instância da classe Usuario.
    include('../classes/Database.php');
    include('../classes/Usuario.php');
    $conexao = (new Database())->conectar();
    $usuario = new Usuario($conexao);

    // Recupere o ID do usuário a ser excluído da URL
    $id = $_GET['id'];

    // Verifique se o usuário com o ID especificado existe no banco de dados.
    $user = $usuario->buscarUsuarioPorId($id);

    if ($user) {
        // Exclua o usuário do banco de dados
        $usuario->deletarUsuario($id);
        echo 'Usuário excluído com sucesso.';
    } else {
        echo 'Usuário não encontrado.';
    }
} else {
    echo 'Requisição inválida.';
}
?>
