<?php
while (true) {
    echo "\n========= Club Menu ========= \n";
    echo "1. Add club\n";
    echo "2. Update club\n";
    echo "3. Delete club\n";
    echo "4. List clubs\n";
    echo "5. List All Clubs\n";
    echo "6. Back to Minu Principale\n";
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
            case '6':
                break 2;
                break;
            case '0':
                return;
                break;
        default:
            echo "Choix invalide\n";
            break;
    }
}
