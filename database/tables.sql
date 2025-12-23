CREATE DATABASE Sport_Event_Manager;
use Sport_Event_Manager;
CREATE TABLE Club (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    ville VARCHAR(100),
    date_creation DATE
);

CREATE TABLE Equipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    jeu VARCHAR(50),
    club_id INT,
    FOREIGN KEY (club_id) REFERENCES Club(id) ON DELETE CASCADE
);

CREATE TABLE Joueur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    role VARCHAR(50),
    salaire DECIMAL(10,2),
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES Equipe(id) ON DELETE CASCADE
);

CREATE TABLE Tournoi (cat ~/.ssh/id_rsa.pub
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,git remote set-url origin https://github.com/ELMAKHTARLAARIF/E-Sport_Event_Manager.git
git push origin master

    cashprize DECIMAL(15,2),
    format VARCHAR(50),
    date_tournoi DATE
);

CREATE TABLE `Match` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    score_a INT,
    score_b INT,
    equipeA_id INT,
    equipeB_id INT,
    tournoi_id INT,
    gagnant_id INT,
    FOREIGN KEY (equipeA_id) REFERENCES Equipe(id),
    FOREIGN KEY (equipeB_id) REFERENCES Equipe(id),
    FOREIGN KEY (tournoi_id) REFERENCES Tournoi(id) ON DELETE CASCADE,
    FOREIGN KEY (gagnant_id) REFERENCES Equipe(id)
);

CREATE TABLE Sponsor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    contribution DECIMAL(15,2),
    tournoi_id INT,
    FOREIGN KEY (tournoi_id) REFERENCES Tournoi(id) ON DELETE CASCADE
);
