<?php
require_once './getConnection.php';
require_once "Model.php";

class Tournament extends Model
{
    protected string $table = "Tournoi";

    private string $title = '';
    private float $cashprize = 0;
    private string $format = '';

    public function setTitle(string $title): void
    {
        if (!empty($title)) $this->title = $title;
    }

    public function setCashprize(float $cashprize): void
    {
        if ($cashprize > 0) $this->cashprize = $cashprize;
    }

    public function setFormat(string $format): void
    {
        if (!empty($format)) $this->format = $format;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCashprize(): float
    {
        return $this->cashprize;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function create(): bool
    {
        $sql = "INSERT INTO Tournoi (titre, cashprize, format)
                VALUES (:titre, :cashprize, :format)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':titre' => $this->title,
            ':cashprize' => $this->cashprize,
            ':format' => $this->format
        ]);
    }

    public function update(int $id): bool
    {
        $sql = "UPDATE Tournoi
                SET titre = ?, cashprize = ?, format = ?
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $this->title,
            $this->cashprize,
            $this->format,
            $id
        ]);
    }
}
