<?php
while (true) {
echo "\n=========  Tournoi Menu ========= \n";
echo "1. Add Tournoi\n";
echo "2. Update Tournoi\n";
echo "3. Delete Tournoi\n";
echo "4. List Tournois\n";
echo "5. Show Tournoi\n";
echo "6. Back to Menu Principale\n";
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
        case '6':
            break 2;
        case '0':
            exit;
        default:
            echo "Choix invalide\n";
            break;
    }
}