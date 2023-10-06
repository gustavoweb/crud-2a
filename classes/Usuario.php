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
}


?>