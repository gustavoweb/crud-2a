<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'crud3';
    private $conexao;

    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
        if ($this->conexao->connect_error) {
            die("Erro na conexão: " . $this->conexao->connect_error);
        }
        return $this->conexao;
    }
}
?>
