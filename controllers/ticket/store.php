<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$store = Ticket::store([
    'objet' => $_POST['objet'],
    'contenu' => $_POST['contenu'],
    'idstatut' => $_POST['idstatut'],
]);

if (! $store) {
    exit('On a eu un problème');
}

// header('Location: /ticket/show?id='.Ticket::getPdo()->lastInsertId());
header('Location: /ticket');
