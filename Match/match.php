<?php
class MatchEvent
{
    private int $score_teamA;
    private int $score_teamB;
    private PDO $pdo;

    public function __construct()
    {
        require_once 'getConnection.php';
    }

    public function setScorA(string $score_teamA)
    {
        if (!empty($score_teamA)) {
            $this->score_teamA = $score_teamA;
        }
    }

    public function setScorB(string $score_teamB)
    {
        if (!empty($score_teamB)) {
            $this->score_teamB = $score_teamB;
        }
    }
    public function getScorA()
    {
        return $this->score_teamA;
    }
    public function getScorB()
    {
        return $this->score_teamB;
    }

    public function createMatch()
    {

        $sql = "INSERT INTO MatchEvent (score_teamA, score_teamB) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->score_teamA, $this->score_teamB]);
        if ($stmt) {
            $console = new Console();

            $console->write('Match Was add Successfully', 'green');
        }
    }

    public function updateMatch() {}

    public function deleteMatch() {}

    public function ListMatch($id)
    {
        $sql = "SELECT * FROM Sponsor WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "score team A:" . $result['score_teamA'] . "\n";
        echo "score team A:" . $result['score_teamB'] . "\n";
    }
}
