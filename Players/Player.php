<?php
class Player
{
    private string $pseudo;
    private string $ville;
    private string $role;
    private float $salaire;
    private PDO $pdo;

    public function __construct()
    {
        require_once 'getConnection.php';
    }

    public function setPseudo(string $pseudo): void
    {
        if (!empty($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setVille(string $ville): void
    {
        if (!empty($ville)) {
            $this->ville = $ville;
        }
    }

    public function getVille()
    {
        return $this->ville;
    }
    public function setRole(string $role): void
    {
        if (!empty($role)) {
            $this->role = $role;
        }
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setSalaire(string $salaire): void
    {
        if (!empty($salaire)) {
            $this->salaire = $salaire;
        }
    }

    public function getSalaire()
    {
        return $this->salaire;
    }
    public function CreatePlayer()
    {
        $sql = "INSERT INTO Joueur (pseudo, ville,role,salaire) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->pseudo, $this->ville,$this->role,$this->salaire]);
        if ($stmt) {
            $console = new Console();
            $console->write('Player Was add Successfully', 'green');
        }
    }

    public function updatePlayer() {}
    public function deletePlayer() {}

    public function listPlayer($id) {
                $sql = "SELECT * FROM Club WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "Player Pseudo:" . $result['pseudo']."\n";
        echo "Player City:" . $result['ville']."\n";
        echo "Player Role:" . $result['role']."\n";
    }
}
