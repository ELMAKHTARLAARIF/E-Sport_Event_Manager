<?php
while (true) {


    require_once "console.php";
    require_once "Club/Club.php";
    require_once "Équipe/Team.php";
    require_once "Players/Player.php";
    require_once "Tournoi/Tournament.php";
    require_once "sponsors/Sponsor.php";
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
    switch ($choix) {
        case '1':
            require_once 'cases/ClubCase.php';
            break;
        case '2':
            require_once 'cases/TournoiCase.php';
            break;
        case '3':
            require_once 'cases/PlayerCase.php';
            break;
        case '4':
            require_once 'cases/MatchCase.php';
            break;
        case '5':
            require_once 'cases/SponsorCase.php';;
            break;
        case '6':
            require_once 'cases/TeamCase.php';
            break;
        case '0':
            return;
    }
}
