<?php

require_once "console.php";
require_once "Club/Club.php";
require_once "Équipe/Team.php";
require_once "Players/Player.php";
require_once "Tournoi/Tournament.php";
require_once "sponsors/sponsor.php";
require_once "Model.php";

echo "========= Menu Principale ========= \n";
echo "1. Club\n";
echo "2. Tournoi\n";
echo "3. Player\n";
echo "4. Match\n";
echo "5. sponsors\n";
echo "6. Team\n";
echo "0. Quite\n";
$console = new Console();

$choix = $console->read((string)$console->write('Entre votre choix', 'orange'));
while ($choix == 1) {
    echo "\n========= Club Menu ========= \n";
    echo "1. Add club\n";
    echo "2. Update club\n";
    echo "3. Delete club\n";
    echo "4. List clubs\n";
    echo "5. List All Clubs\n";
    echo "0. Quite\n";

    $console = new Console();

    $console->write('Entre votre choix', 'orange');
    $second_choix = $console->read('');

switch ($second_choix) {

    case '1':
        $c = new Club();
        $c->setName($console->read("Votre nom: "));
        $c->setVille($console->read("Votre ville: "));
        $c->setDateCreation($console->read("Date de Creation: "));
        $c->create();
        break;

    case '2':
        $c = new Club();
        $id = (int)$console->read("ID du club: ");
        $c->setName($console->read("Nouveau nom: "));
        $c->setVille($console->read("Nouvelle ville: "));
        $c->setDateCreation($console->read("Nouvelle date: "));
        $c->update($id);
        break;

    case '3':
        $c = new Club();
        $id = (int)$console->read("ID du club: ");
        $c->delete($id);
        break;

    case '4':
        $c = new Club();
        $id = (int)$console->read("ID du club: ");
        $club = $c->find($id);

        if ($club) {
            echo "Nom: {$club['nom']}\n";
            echo "Ville: {$club['ville']}\n";
            echo "Date: {$club['date_creation']}\n";
        } else {
            echo "Club introuvable\n";
        }
        break;


    case '5':
        $c = new Club();
        $clubs = $c->findAll();
        foreach ($clubs as $club) {
            echo "ID: {$club['id']} | {$club['nom']} | {$club['ville']}\n";
        }
        break;

    default:
        echo "Choix invalide\n";
        break;
}

}
while ($choix == 2) {
    echo "\n=========  Tournoi Menu ========= \n";
    echo "1. Add Tournoi\n";
    echo "2. Update Tournoi\n";
    echo "3. Delete Tournoi\n";
    echo "4. List Tournois\n";
    echo "5. Show Tournoi\n";
    echo "0. Retour\n";

    $second_choix = $console->read("Votre choix: ");

    switch ($second_choix) {

        case '1':
            $t = new Tournament();
            $t->setTitle($console->read("Tournoi title: "));
            $t->setCashprize((float)$console->read("Tournoi Cashprize: "));
            $t->setFormat($console->read("Tournoi format: "));
            $t->create();
            echo "Tournoi ajouté avec succès\n";
            break;

        case '2':
            $t = new Tournament();
            $id = (int)$console->read("ID du tournoi: ");
            $t->setTitle($console->read("Nouveau title: "));
            $t->setCashprize((float)$console->read("Nouveau Cashprize: "));
            $t->setFormat($console->read("Nouveau format: "));
            $t->update($id);
            echo "Tournoi mis à jour\n";
            break;

        case '3':
            $t = new Tournament();
            $id = (int)$console->read("ID du tournoi: ");
            $t->delete($id);
            echo "Tournoi supprimé\n";
            break;

        case '4':
            $t = new Tournament();
            $tournois = $t->findAll();
            foreach ($tournois as $tournoi) {
                echo "ID: {$tournoi['id']} | {$tournoi['titre']} | Cashprize: {$tournoi['cashprize']} | Format: {$tournoi['format']}\n";
            }
            break;

        case '5':
            $t = new Tournament();
            $id = (int)$console->read("ID du tournoi: ");
            $tournoi = $t->find($id);
            if ($tournoi) {
                echo "ID: {$tournoi['id']}\n";
                echo "Titre: {$tournoi['titre']}\n";
                echo "Cashprize: {$tournoi['cashprize']}\n";
                echo "Format: {$tournoi['format']}\n";
            } else {
                echo "Tournoi introuvable\n";
            }
            break;

        default:
            echo "Choix invalide\n";
            break;
    }
}


while ($choix == 3) {
    echo "\n========= Player Menu ========= \n";
    echo "1. Add Player\n";
    echo "2. Update Player\n";
    echo "3. Delete Player\n";
    echo "4. List Player\n";
    echo "5. List All Players\n";
    echo "0. Quit\n";

    $console = new Console();
    $console->write('Entre votre choix', 'orange');
    $second_choix = $console->read('');

    switch ($second_choix) {
        case '1':
            $p = new Player();
            $p->setPseudo($console->read((string)$console->write("Pseudo du joueur: ")));
            $p->setRole($console->read("Role du joueur: "));
            $p->setSalaire((float)$console->read("Salaire du joueur: "));
            $p->Create();
            break;

        case '2':
            $p = new Player();
            $p->setPseudo($console->read((string)$console->write("Nouveau pseudo: ")));            $p->setRole($console->read("Nouveau role: "));
            $p->setSalaire((float)$console->read("Nouveau salaire: "));
            $id = (int)$console->read("ID du joueur à mettre à jour: ");
            $p->update($id);
            break;

        case '3':
            $p = new Player();
            $id = (int)$console->read("ID du joueur à supprimer: ");
            $p->delete($id);
            break;

        case '4':
            $p = new Player();
            $id = (int)$console->read("ID du joueur à afficher: ");
            $p->find($id);
            break;

        case '5':
            $p = new Player();
            $players = $p->findAll();
            foreach ($players as $player) {
                echo "ID: {$player['id']}, Pseudo: {$player['pseudo']}, Ville: {$player['ville']}, Role: {$player['role']}, Salaire: {$player['salaire']}\n";
            }
            break;

        case '0':
            break 2;
        default:
            echo "Choix invalide\n";
            break;
    }
}

while ($choix == 4) {
    echo "\n========= Match Menu ========= \n";
    echo "1. Add Match\n";
    echo "2. Update Match\n";
    echo "3. Delete Match\n";
    echo "4. List Match\n";
    echo "5. List All Matches\n";
    echo "0. Quit\n";

    $console = new Console();
    $console->write('Entre votre choix', 'orange');
    $second_choix = $console->read('');

    switch ($second_choix) {
        case '1':
            $m = new MatchEvent();
            $m->setScorA($console->read((string)$console->write("Score équipe A: ")));
            $m->setScorB($console->read((string)$console->write("Score équipe B: ")));
            $m->create();
            break;

        case '2':
            $m = new MatchEvent();
            $m->setScorA($console->read((string)$console->write("Nouveau score équipe A: ")));
            $m->setScorB($console->read((string)$console->write("Nouveau score équipe B: ")));
            $id = (int)$console->read("ID du match à mettre à jour: ");
            $m->update($id);
            break;

        case '3':
            $m = new MatchEvent();
            $id = (int)$console->read("ID du match à supprimer: ");
            $m->delete($id);
            break;

        case '4':
            $m = new MatchEvent();
            $id = (int)$console->read("ID du match à afficher: ");
            $m->find($id);
            break;

        case '5':
            $m = new MatchEvent();
            $matches = $m->findAll();
            foreach ($matches as $match) {
                echo "ID: {$match['id']}, Score A: {$match['scoreA']}, Score B: {$match['scoreB']}\n";
            }
            break;

        case '0':
            break 2;
        default:
            echo "Choix invalide\n";
            break;
    }
}

while ($choix == 5) {
    echo "\n========= Sponsor Menu ========= \n";
    echo "1. Add Sponsor\n";
    echo "2. Update Sponsor\n";
    echo "3. Delete Sponsor\n";
    echo "4. Show Sponsor\n";
    echo "5. List All Sponsors\n";
    echo "0. Quit\n";

    $console = new Console();
    $second_choix = $console->read("Votre choix: ");

    switch ($second_choix) {
        case '1': 
            $s = new Sponsor();
            $s->setName($console->read("Sponsor Name: "));
            $s->setContribution((float)$console->read("Sponsor Contribution: "));
            $s->create();
            echo "Sponsor added successfully\n";
            break;

        case '2': 
            $s = new Sponsor();
            $id = (int)$console->read("ID du sponsor à mettre à jour: ");
            $s->setName($console->read("New Sponsor Name: "));
            $s->setContribution((float)$console->read("New Contribution: "));
            $s->update($id);
            echo "Sponsor updated successfully\n";
            break;

        case '3': 
            $s = new Sponsor();
            $id = (int)$console->read("ID du sponsor à supprimer: ");
            $s->delete($id);
            echo "Sponsor deleted successfully\n";
            break;

        case '4': 
            $s = new Sponsor();
            $id = (int)$console->read("ID du sponsor: ");
            $sponsor = $s->find($id);
            if ($sponsor) {
                echo "ID: {$sponsor['id']}, Name: {$sponsor['nom']}, Contribution: {$sponsor['contribution']}\n";
            } else {
                echo "Sponsor not found\n";
            }
            break;

        case '5':
            $s = new Sponsor();
            $sponsors = $s->findAll();
            foreach ($sponsors as $sp) {
                echo "ID: {$sp['id']}, Name: {$sp['nom']}, Contribution: {$sp['contribution']}\n";
            }
            break;

        case '0':
            break 2;
        default:
            echo "Choix invalide\n";
            break;
    }
}

//     echo "\nClub Menu\n";
//     echo "1. Add club\n";
//     echo "2. Update club\n";
//     echo "3. Delete club\n";
//     echo "4. List club\n";
//     echo "0. Quite\n";
//     $console = new Console();

//     $console->write('Entre votre choix', 'orange');
//     $choix = $console->read('');

//     switch ($choix) {
//         case '1':
//             $c = new Club();
//             $console = new Console();
//             $c->setName($console->read((string)($console->write("Votre nom"))));
//             $c->setVille($console->read("Votre ville"));
//             $c->setDate($console->read("Date de Creation"));
//             $c->createClub();
//             break;
//         case '2':
//             $c = new Club();
//             $c->Affiche_Club($console->read((int)($console->write("Votre ID:"))));
//         default:
//             # code...
//             break;
//     }
// }
