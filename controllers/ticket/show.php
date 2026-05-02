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

// Utilisateur : seulement ses propres tickets
if ($profilId === 3 && (int)$ticket['iduser'] !== (int)$sessionUser['id']) {
    header('Location: /ticket');
    exit;
}

// Technicien : seulement les tickets de son agence
if ($profilId === 2) {
    include ROOT.'/models/User.php';
    $createur = User::getById((int)$ticket['iduser']);
    if (!$createur || (int)$createur['agence_id'] !== (int)$sessionUser['agence_id']) {
        header('Location: /ticket');
        exit;
    }
}

view('/ticket/show', compact('ticket', 'profilId'));
