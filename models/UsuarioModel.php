<?php
// models/UsuarioModel.php

class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarUsuario($nome_usuario, $senha_hash) {
        try {
            $sql = "INSERT INTO usuarios (nome_usuario, senha) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$nome_usuario, $senha_hash]);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return false;
            }
            throw $e;
        }
    }

    public function buscarPorNome($nome_usuario) {
        $sql = "SELECT * FROM usuarios WHERE nome_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_usuario]);
        return $stmt->fetch();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function buscarUsuarios($termo) {
        $sql = "SELECT id, nome_usuario FROM usuarios WHERE nome_usuario LIKE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["%$termo%"]);
        return $stmt->fetchAll();
    }
}