<?php

requireAuth();

include ROOT.'/models/Ticket.php';
include ROOT.'/models/Statut.php';
<<<<<<< HEAD
include ROOT.'/models/Categorie.php';

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];
$ticket      = Ticket::getById((int)($_GET['id'] ?? 0));

if (!$ticket) {
    header('Location: /ticket');
    exit;
}

$idStatut = (int)$ticket['idstatut'];

if ($profilId === 3) {
    if ((int)$ticket['iduser'] !== (int)$sessionUser['id'] || $idStatut === 4) {
        header('Location: /ticket');
        exit;
    }
}

if ($profilId === 2) {
    include ROOT.'/models/User.php';
    $createur = User::getById((int)$ticket['iduser']);
    if (!$createur || (int)$createur['agence_id'] !== (int)$sessionUser['agence_id']) {
        header('Location: /ticket');
        exit;
    }
}

$tousStatuts = Statut::all();
$categories  = Categorie::all();

if ($profilId === 1) {
    $options = $tousStatuts;
} elseif ($profilId === 2) {
    $options = array_filter($tousStatuts, fn($s) => (int)$s['id'] !== 4);
} else {
    $options = [];
}

view('/ticket/edit', compact('ticket', 'options', 'profilId', 'categories'));
=======

$options = Statut::all();
$ticket = Ticket::getById($_GET['id']);

view('/ticket/edit', compact('ticket', 'options'));
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
