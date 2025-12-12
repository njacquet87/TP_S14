<?php

require_once(__DIR__."/Database.php");

class Post {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll() {
        $query = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBy(array $params) {
        $query = "SELECT * FROM posts WHERE " . implode(' AND ', array_map(function($key) {
            return "$key = :$key";
        }, array_keys($params)));

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($titre, $contenu, $utilisateur_id) {
        $query = "INSERT INTO posts (titre, contenu, utilisateur_id)
                VALUES (:titre, :contenu, :utilisateur_id)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function update($id, $titre, $contenu, $utilisateur_id) {
        $query = "UPDATE posts 
                SET titre = :titre, contenu = :contenu, utilisateur_id = :utilisateur_id
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM posts WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

}
?>
