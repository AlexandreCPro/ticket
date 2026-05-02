<?php

requireAuth();

include ROOT.'/models/Ticket.php';

<<<<<<< HEAD
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

=======
$store = Ticket::store([
    'objet' => $_POST['objet'],
    'contenu' => $_POST['contenu'],
    'idstatut' => $_POST['idstatut'],
]);

if (! $store) {
    exit('On a eu un problème');
}

// header('Location: /ticket/show?id='.Ticket::getPdo()->lastInsertId());
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
header('Location: /ticket');
