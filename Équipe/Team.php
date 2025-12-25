<?php 
class Team{
    private string $name;
    private string $jeu;
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

    public function setVille(string $jeu): void
    {
        if (!empty($jeu)) {
            $this->jeu = $jeu;
        }
    }

    public function createTeam(): void
    {
        $sql = "INSERT INTO Equipe (nom, jeu) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $this->jeu]);
        if ($stmt) {
            $console = new Console();

            $console->write('Team Was add Successfully', 'green');
        }
    }
    public function updateTeam(){

    }
    public function deleteTeam(){
        
    }
    public function ListTeam($id){
                $sql = "SELECT * FROM Equipe WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        echo "Team Name:" . $result['nom']."\n";
        echo "Team jeu:" . $result['jeu']."\n";
    }
}
?>