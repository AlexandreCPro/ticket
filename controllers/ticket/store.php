<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];

if ($profilId !== 3) {
    header('Location: /ticket');
    exit;
}

$idCategorie = (int)($_POST['idcategorie'] ?? 0) ?: null;

Ticket::store([
    'objet'       => $_POST['objet'],
    'contenu'     => $_POST['contenu'],
    'idstatut'    => 1,
    'iduser'      => $sessionUser['id'],
    'idcategorie' => $idCategorie,
]);

header('Location: /ticket');
