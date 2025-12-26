<?php
require_once './getConnection.php';
class Player extends Model
{
    protected string $table = "players";
    private string $pseudo = '';
    private string $role = '';
    private float $salaire = 0;

    public function setPseudo(string $pseudo)
    {
        if (!empty($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }
    public function setRole(string $role)
    {
        if (!empty($role)) {
            $this->role = $role;
        }
    }
    public function setSalaire(float $salaire)
    {
        if ($salaire > 0) {
            $this->salaire = $salaire;
        }
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function Create()
    {
        $sql = "INSERT INTO Joueur (pseudo, role, salaire) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->pseudo, $this->role, $this->salaire]);

        if ($stmt) {
            $console = new Console();
            $console->write('Player Was add Successfully', 'green');
        }
    }

    public function update(int $id)
    {
        $sql = "UPDATE Joueur SET pseudo = ?, role = ?, salaire = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->pseudo, $this->role, $this->salaire, $id]);
    }
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM Joueur WHERE id = ?");
        $stmt->execute([$id]);
    }


}
