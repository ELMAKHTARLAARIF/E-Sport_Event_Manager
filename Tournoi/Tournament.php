<?php
class Tournament
{
    private string $title;
    private float $cashprize;
    private string $format;
    private $pdo;

    public function __construct()
    {
        require_once 'getConnection.php';
    }
    public function setTitle($title)
    {
        if (empty($title)) {
            $this->title = $title;
        }
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function setCashprize($cashprize)
    {
        if (empty($cashprize)) {
            $this->cashprize = $cashprize;
        }
    }

    public function getCachprize()
    {
        return $this->cashprize;
    }

    public function setFormat($format)
    {
        if (empty($format)) {
            $this->format = $format;
        }
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function createTournoi()
    {
        $sql = "INSERT INTO Tournoi (title, cashprize,format) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->title, $this->cashprize, $this->format]);
        if ($stmt) {
            $console = new Console();
            $console->write('Tournoi Was add Successfully', 'green');
        }
    }

    public function updateTournoi() {}

    public function deleteTournoi() {}

    public function ListTournoi($id)
    {
        $sql = "SELECT * FROM Tournoi WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "Sponsor Name:" . $result['title'] . "\n";
        echo "Sponsor cashprize:" . $result['cashprize'] . "\n";
        echo "Sponsor format:" . $result['format'] . "\n";
    }
}
