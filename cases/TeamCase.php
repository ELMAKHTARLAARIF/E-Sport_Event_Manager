<?php
while (true) {
echo "\n========= Team Menu ========= \n";
echo "1. Add Team\n";
echo "2. Update Team\n";
echo "3. Delete Team\n";
echo "4. Show Team\n";
echo "5. List All Teams\n";
echo "6. Teams With Many Matches\n";
echo "7. Back to Menu Principale\n";
echo "0. Quit\n";

$console = new Console();
$second_choix = $console->read("Votre choix: ");
    switch ($second_choix) {
        case '1':
            $team = new Team();
            $team->setName($console->read("Team Name: "));
            $team->setJeu($console->read("Game Name: "));
            $team->create();
            echo "Team added successfully\n";
            break;

        case '2':
            $team = new Team();
            $id = (int)$console->read("Enter ID Of Team: ");
            $team->setName($console->read("New Team Name: "));
            $team->setJeu($console->read("New Game: "));
            $team->update($id);
            echo "Team updated successfully\n";
            break;

        case '3':
            $team = new Team();
            $id = (int)$console->read("Team ID to Delete: ");
            $team->delete($id);
            echo "Team deleted successfully\n";
            break;

        case '4':
            $team = new Team();
            $id = (int)$console->read("Team ID: ");
            $tData = $team->find($id);
            if ($tData) {
                echo "ID: {$tData['id']}, Name: {$tData['nom']}, Game: {$tData['jeu']}\n";
            } else {
                echo "Team not found\n";
            }
            break;

        case '5':
            $team = new Team();
            $allTeams = $team->findAll();
            foreach ($allTeams as $t) {
                echo "ID: {$t['id']}, Name: {$t['nom']}, Game: {$t['jeu']}\n";
            }
            break;

        case '6':
            $team = new Team();
            $activeTeams = $team->teamsWithManyMatches();
            foreach ($activeTeams as $t) {
                echo "Active Team: {$t['nom']}\n";
            }
            break;
        case '7':
            break 2;
            break;
        case '0':
            return;

        default:
            echo "Choix invalide\n";
            break;
    }
}