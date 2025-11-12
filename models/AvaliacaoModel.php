<?php

class AvaliacaoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criar($id_usuario, $album, $artista, $nota) {
        $sql = "INSERT INTO avaliacoes (id_usuario, nome_album, artista, nota) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_usuario, $album, $artista, $nota]);
    }

    public function buscarPorUsuario($id_usuario) {
        $sql = "SELECT * FROM avaliacoes WHERE id_usuario = ? ORDER BY data_avaliacao DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_usuario]);
        return $stmt->fetchAll();
    }

    public function buscarPorId($id_avaliacao) {
        $sql = "SELECT * FROM avaliacoes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_avaliacao]);
        return $stmt->fetch();
    }

    public function atualizar($id_avaliacao, $album, $artista, $nota) {
        $sql = "UPDATE avaliacoes SET nome_album = ?, artista = ?, nota = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$album, $artista, $nota, $id_avaliacao]);
    }

    public function deletar($id_avaliacao) {
        $sql = "DELETE FROM avaliacoes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_avaliacao]);
    }
}