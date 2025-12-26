<?php 
require_once './getConnection.php';
require_once "Model.php";
class Team extends Model{
    protected string $table ='Team';
    private string $name;
    private string $jeu;

    public function setName(string $name): void
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function setVille(string $jeu): void
    {
        if (!empty($jeu)) {
            $this->jeu = $jeu;
        }
    }

    public function create(): bool
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

}
?>
