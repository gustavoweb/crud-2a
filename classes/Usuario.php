<?php
class Usuario {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function listarUsuarios() {
        $usuarios = array();

        // Prepare a consulta SQL para listar todos os usuários
        $sql = "SELECT * FROM usuarios";

        // Preparar e executar a consulta
        $result = $this->db->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
            $result->close();
        }

        return $usuarios;
    }

    public function adicionarUsuario($nome, $email, $senha, $caminhoImagem) {
        // Verifique se o email já está em uso
        if ($this->verificarEmailExistente($email)) {
            return false; // Email já está em uso, não é possível adicionar o usuário.
        }
        // Hash da senha para maior segurança
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
            // Inserir um novo usuário na tabela
        $sql = "INSERT INTO usuarios (usu_nome, usu_email, usu_senha, usu_foto_perfil) VALUES (?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $nome, $email, $senhaHash, $caminhoImagem);
        
        if ($stmt->execute()) {
            return true; // Usuário adicionado com sucesso.
        } else {
            return false; // Erro ao adicionar o usuário.
        }
    }

    public function verificarEmailExistente($email) {
        $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE usu_email = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        return $row['total'] > 0;
    }

} //Fecha a Classe


?>