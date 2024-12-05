<?php

class Database {
    private string $host = '127.0.0.1';
    private string $dbName = 'pabau';
    private string $username = 'root';
    private string $password = 'neznam2314.';
    private $pdo;
    private $stmt;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($params);
            return $this->stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function fetch($sql, $params = [])
    {
        $this->query($sql, $params);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, $params = [])
    {
        $this->query($sql, $params);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function storeVote($user_id, $nominee, $comment, $created_at, $category)
    {

        try {
            $sql = "INSERT INTO Votes (`user_id`, `nominee`, `comment`, `created_at`, `category`) VALUES (:user_id, :nominee, :comment, :created_at, :category)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':nominee', $nominee);
            $stmt->bindParam(':comment', $comment);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':category', $category);

            return $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
            error_log("Failed to insert vote: " . $e->getMessage());
            die();
        }
    }

    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return $this->stmt->rowCount();
    }
}
