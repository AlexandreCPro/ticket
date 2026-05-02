<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];
$ticket      = Ticket::getById((int)($_GET['id'] ?? 0));

if (!$ticket) {
    header('Location: /ticket');
    exit;
}

// Utilisateur : jamais de suppression
if ($profilId === 3) {
    header('Location: /ticket');
    exit;
}

// Technicien : suppression uniquement si statut = Cloturé (id 4)
if ($profilId === 2) {
    include ROOT.'/models/User.php';
    $createur = User::getById((int)$ticket['iduser']);
    if (!$createur || (int)$createur['agence_id'] !== (int)$sessionUser['agence_id']) {
        header('Location: /ticket');
        exit;
    }
    if ((int)$ticket['idstatut'] !== 4) {
        header('Location: /ticket/show?id=' . $ticket['id'] . '&erreur=non_cloture');
        exit;
    }
}

// Admin : aucune restriction
Ticket::deleteById((int)$ticket['id']);

header('Location: /ticket');
