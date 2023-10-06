<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    // Inclua seus arquivos PHP (Database.php e Usuario.php) e crie uma instância da classe Usuario.
    include('../classes/Database.php');
    include('../classes/Usuario.php');
    $conexao = (new Database())->conectar();
    $usuario = new Usuario($conexao);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Gere um nome de arquivo único para a imagem
    $nomeAleatorio = bin2hex(random_bytes(8)); // Gera uma sequência aleatória de 16 caracteres em hexadecimal
    $extensao = pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo original
    $nomeImagemUnico = time() . "_" . $nomeAleatorio . "." . $extensao; // Combina timestamp atual, nome aleatório e extensão

    $caminhoDestino = '../assets/img/perfil/';
    $caminhoCompleto = $caminhoDestino . $nomeImagemUnico;

    if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminhoCompleto)) {
        // O upload foi bem-sucedido, continue com o cadastro do usuário

        // Verifique se o email já está em uso (você deve implementar esse método em Usuario.php).
        if ($usuario->verificarEmailExistente($email)) {
            echo 'Email já está em uso. Escolha outro email.';
        } else {
            // Adicione o novo usuário ao banco de dados.
            if ($usuario->adicionarUsuario($nome, $email, $senha, $caminhoCompleto)) {
                // echo 'Usuário adicionado com sucesso.';
                header("location: index.php");
            } else {
                echo 'Erro ao adicionar o usuário.';
            }
        }
    } else {
        echo 'Requisição inválida.';
    }
}

?>