<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$updt = Ticket::updateById([
    'objet'     => $_POST['objet'],
    'contenu'   => $_POST['contenu'],
    'idstatut'  => $_POST['idstatut'],
], $_GET['id']);

if (! $updt) {
    die('On a eu un problème');
}

header('Location: /');
