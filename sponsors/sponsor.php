<?php
class Tournament
{
    private string $name;
    private float $contribution;

    public function __construct()
    {
        require_once 'getConnection.php';
    }
    public function createTournoi()
    {
        $sql = "INSERT INTO Club (nom, contribution) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $this->contribution]);
        if ($stmt) {
            $console = new Console();

            $console->write('Sponsor Was add Successfully', 'green');
        }
    }

    public function updateTournoi() {}

    public function deleteTournoi() {}

    public function Affiche_Sponsor($id)
    {
        $sql = "SELECT * FROM Sponsor WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "Sponsor Name:" . $result['nom'] . "\n";
        echo "Sponsor contribution:" . $result['contribution'] . "\n";
    }
}
