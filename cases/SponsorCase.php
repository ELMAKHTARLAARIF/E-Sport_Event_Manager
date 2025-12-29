<?php
while (true) {
    echo "\n========= Sponsor Menu ========= \n";
    echo "1. Add Sponsor\n";
    echo "2. Update Sponsor\n";
    echo "3. Delete Sponsor\n";
    echo "4. Show Sponsor\n";
    echo "5. List All Sponsors\n";
    echo "6. Back to Menu principale\n";
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
        case '6':
            break 2;
            break;
        case '0':
            return;
        default:
            echo "Choix invalide\n";
            break;
    }
}
