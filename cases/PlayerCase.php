<?php
while (true) {
    echo "\n========= Player Menu ========= \n";
    echo "1. Add Player\n";
    echo "2. Update Player\n";
    echo "3. Delete Player\n";
    echo "4. List Player\n";
    echo "5. List All Players\n";
    echo "6. Back to Menu principale\n";
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
            $p->setPseudo($console->read((string)$console->write("Nouveau pseudo: ")));
            $p->setRole($console->read("Nouveau role: "));
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

