<?php
require_once './getConnection.php';
require_once "Model.php";
class Club extends Model
{
    protected string $table = 'Club';
    private string $name;
    private string $ville;
    private string $date_creation;

    public function setName(string $name)
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function setVille(string $ville)
    {
        if (!empty($ville)) {
            $this->ville = $ville;
        }
    }

    public function setDateCreation(string $date)
    {
        if (!empty($date)) {
            $this->date_creation = $date;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }
    public function create()
    {
        $sql = "INSERT INTO Club (nom, ville, date_creation)
                VALUES (?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$this->name,$this->ville,$this->date_creation]);
    }


    public function update(int $id)
    {
        $sql = "UPDATE Club
                SET nom = :nom, ville = :ville, date_creation = :date_creation
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$this->name,$this->ville,$this->date_creation,$id]);
    }

}
