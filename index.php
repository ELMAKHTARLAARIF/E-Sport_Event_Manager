<?php

require_once "console.php";
require_once "Club/Club.php";
require_once "Équipe/Team.php";
require_once "Players/Player.php";
require_once "Tournoi/Tournament.php";

echo "Menu Principale\n";
echo "1. Club\n";
echo "2. Tournoi\n";
echo "3. Match\n";
echo "4. joueurs\n";
echo "5. Equipe\n";
echo "6. sponsors\n";
echo "7. Quite\n";
$console = new Console();

$choix = $console->read((string)$console->write('Entre votre choix', 'orange'));
while ($choix == 1) {
    echo "\nClub Menu\n";
    echo "1. Add club\n";
    echo "2. Update club\n";
    echo "3. Delete club\n";
    echo "4. List club\n";
    echo "0. Quite\n";
    $console = new Console();

    $console->write('Entre votre choix', 'orange');
    $choix = $console->read('');

    switch ($choix) {
        case '1':
            $c = new Club();
            $console = new Console();
            $c->setName($console->read((string)($console->write("Votre nom"))));
            $c->setVille($console->read("Votre ville"));
            $c->setDate($console->read("Date de Creation"));
            $c->createClub();
            break;
        case '2':
            $c = new Club();
            $c->list_Club($console->read((int)($console->write("Votre ID:"))));
        default:
            break;
    }
}
while ($choix == 2) {
    echo "\Tournoi Menu\n";
    echo "1. Add Tournoi\n";
    echo "2. Update Tournoi\n";
    echo "3. Delete Tournoi\n";
    echo "4. List Tournoi\n";
    echo "0. Quite\n";
    $console = new Console();

    $console->write('Entre votre choix', 'orange');
    $choix = $console->read('');

    switch ($choix) {
        case '1':
            $c = new Team();
            $console = new Console();
            $c->setName($console->read((string)($console->write("Tournoi name :"))));
            $c->setVille($console->read("game :"));
            $c->createTeam();
            break;
        case '2':
            $c = new Tournament();
            $c->ListTournoi($console->read((int)($console->write("Votre ID:"))));

        default:
            break;
    }
}
while ($choix == 3) {
    echo "\Players Menu\n";
    echo "1. Add Player\n";
    echo "2. update Player\n";
    echo "3. delete Player\n";
    echo "4. Afficher Player\n";
    echo "0. Quite\n";
    $console = new Console();

    $console->write('Entre votre choix', 'orange');
    $choix = $console->read('');

    switch ($choix) {
        case '1':
            $c = new MatchEvent();
            $console = new Console();
            $c->setScorA($console->read((string)($console->write("Scor team A :"))));
            $c->setScorB($console->read((string)($console->write("Scor team B :"))));
            $c->createMatch();
            break;
        case '2':
            $c = new MatchEvent();
            $c->ListMatch($console->read((int)($console->write("Votre ID:"))));

        default:
            break;
    }
}
// while ($choix == 4) {
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
//             $c->list_Club($console->read((int)($console->write("Votre ID:"))));
//         default:
//             # code...
//             break;
//     }
// }
// while ($choix == 5) {
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
// while ($choix == 6) {
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
