<?php
require_once  'getConnection.php';

abstract class Model
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function find(int $id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        return $this->pdo
            ->query("SELECT * FROM {$this->table}")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM {$this->table} WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }

    abstract public function create() ;
    abstract public function update(int $id);
}

