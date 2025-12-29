<?php
while (true) {
    echo "\n========= Match Menu ========= \n";
    echo "1. Add Match\n";
    echo "2. Update Match\n";
    echo "3. Delete Match\n";
    echo "4. List Match\n";
    echo "5. List All Matches\n";
    echo "6. Generate Random Match (1st round)\n";
    echo "7.stats By Tournament";
    echo "8. Back to Minu Principale";
    echo "9. Quite";

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
        case '6':
            $m = new MatchEvent();
            $tournoi_id = (int)$console->read("Enter Tournament ID: ");
            $m->generateRandomMatch($tournoi_id);
            break;

        case '7':
            $m = new MatchEvent();
            $stats = $m->statsByTournament();

            foreach ($stats as $row) {
                echo "Tournoi: {$row['tournoi']} | Équipe: {$row['equipe']} | Matchs: {$row['total_matchs']}\n";
            }
            break;
        case '8':
            break 2;
            break;
        case '0':
            return;
        default:
            echo "Choix invalide\n";
            break;
    }
}
