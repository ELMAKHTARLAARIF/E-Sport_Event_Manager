<?php
require_once './getConnection.php';
require_once "Model.php";
class Sponsor extends Model
{
    protected string $table="Sponsor";

    private string $name = '';
    private float $contribution = 0;
    private $isValid = true;

    public function setName(string $name)
    {
        if (!empty($name)) {
            $this->name = $name;
        } else
            $this->isValid = false;
    }

    public function setContribution(float $contribution)
    {
        if ($contribution > 0) {
            $this->contribution = $contribution;
        } else
            $this->isValid = false;
    }
    public function create()
    {
        if ($this->isValid) {
            $sql = "INSERT INTO Sponsor (nom, contribution) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->name, $this->contribution]);
            if ($stmt) {
                $console = new Console();
                $console->write('Sponsor was added successfully', 'green');
            }
        } else {
            $console = new Console();
            $console->write('Name or Contribotion Invalid!!!', 'red');
        }
    }

    public function update(int $id): void
    {
        $sql = "UPDATE Sponsor SET nom = ?, contribution = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->name, $this->contribution, $id]);
    }

}
