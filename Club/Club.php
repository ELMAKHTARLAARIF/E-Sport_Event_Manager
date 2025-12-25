<?php
require_once './database/Connection.php';

class Club
{
    private string $name;
    private string $ville;
    private $Date_creation;
    private PDO $pdo;

    public function __construct()
    {
        require_once 'getConnection.php';
    }

    public function setName(string $name): void
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function setVille(string $ville): void
    {
        if (!empty($ville)) {
            $this->ville = $ville;
        }
    }
    public function setDate($date_creation): void
    {
        if (!empty($Date_creation)) {
            $this->Date_creation = $date_creation;
        }
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getVille(): string
    {
        return $this->ville;
    }
    public function getDate(): string
    {
        return $this->Date_creation;
    }

    public function createClub(): void
    {
        $sql = "INSERT INTO Club (nom, ville,date_creation) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $this->ville, $this->Date_creation]);
        if ($stmt) {
            $console = new Console();

            $console->write('Club Was add Successfully', 'green');
        }
    }

    public function list_Club($id)
    {
        $sql = "SELECT * FROM Club WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "Club Name:" . $result['nom']."\n";
        echo "Club Ville:" . $result['ville']."\n";
        echo "Date Creation:" . $result['date_creation']."\n";
    }
}
