<?php
require_once './getConnection.php';
require_once "Model.php";

class Team extends Model
{
    protected string $table = 'Equipe';
    private string $name;
    private string $jeu;

    public function setName(string $name)
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function setJeu(string $jeu)
    {
        if (!empty($jeu)) {
            $this->jeu = $jeu;
        }
    }

    public function create()
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Equipe (nom, jeu) VALUES (?, ?)"
        );
        return $stmt->execute([$this->name, $this->jeu]);
    }

    public function update(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            "UPDATE Equipe SET nom = ?, jeu = ? WHERE id = ?"
        );
        return $stmt->execute([$this->name, $this->jeu, $id]);
    }

    public function teamsWithManyMatches()
    {
        $sql = "
        SELECT nom
        FROM Equipe
        WHERE id IN (
            SELECT equipeA_id
            FROM MatchEvent
            GROUP BY equipeA_id
            HAVING COUNT(*) > 2
        )
    ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
