<?php
require_once './getConnection.php';
require_once "Model.php";
class MatchEvent extends Model
{
    protected string $table = "MatchEvent";
    private int $score_teamA = 0;
    private int $score_teamB = 0;


    public function setScorA(int $score_teamA): void
    {
        $this->score_teamA = $score_teamA;
    }

    public function setScorB(int $score_teamB): void
    {
        $this->score_teamB = $score_teamB;
    }

    public function getScorA(): int
    {
        return $this->score_teamA;
    }

    public function getScorB(): int
    {
        return $this->score_teamB;
    }

    public function generateRandomMatch(int $tournoi_id)
    {
        $stmt = $this->pdo->query("SELECT id FROM Equipe");
        $teams = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (count($teams) < 2) {
            echo "Not enough teams to generate a match.\n";
            return;
        }

        shuffle($teams);
        $teamA = $teams[0];
        $teamB = $teams[1];

        $insert = $this->pdo->prepare("
            INSERT INTO MatchEvent (score_a, score_b, equipeA_id, equipeB_id, tournoi_id)
            VALUES (0, 0, ?, ?, ?)
        ");
        $insert->execute([$teamA, $teamB, $tournoi_id]);

        echo "Random match created: Team $teamA vs Team $teamB in tournament $tournoi_id\n";
    }

    public function create()
    {
        $sql = "INSERT INTO MatchEvent (score_teamA, score_teamB) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->score_teamA, $this->score_teamB]);

        if ($stmt) {
            $console = new Console();
            $console->write('Match Was add Successfully', 'green');
        }
    }

    public function update(int $id)
    {
        $sql = "UPDATE MatchEvent SET score_teamA = ?, score_teamB = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->score_teamA, $this->score_teamB, $id]);
    }

    public function statsByTournament() {
    $sql = "
        SELECT 
            Tournoi.titre AS tournoi,
            Equipe.nom AS equipe,
            COUNT(MatchEvent.id) AS total_matchs
        FROM Tournoi
        JOIN MatchEvent ON MatchEvent.tournoi_id = Tournoi.id
        JOIN Equipe ON Equipe.id = MatchEvent.equipeA_id
        GROUP BY Tournoi.titre, Equipe.nom
    ";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
