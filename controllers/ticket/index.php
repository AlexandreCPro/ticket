<?php

<<<<<<< HEAD
requireAuth();

include ROOT.'/models/Ticket.php';

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];

if ($profilId === 1) {
    // Administrateur : tous les tickets
    $retourSQL = Ticket::all();
} elseif ($profilId === 2) {
    // Technicien : tickets de son agence uniquement
    $retourSQL = Ticket::allForTechnicien((int)$sessionUser['agence_id']);
} else {
    // Utilisateur : ses propres tickets uniquement
    $retourSQL = Ticket::allForUtilisateur((int)$sessionUser['id']);
}

view('ticket/index', compact('retourSQL', 'profilId'));
=======
// CONTROLEUR
include ROOT.'/models/Ticket.php';

$retourSQL = Ticket::all();

view('ticket/index', compact('retourSQL')); // ['retourSQL'=>$retourSQL]
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
