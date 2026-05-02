<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$delete = Ticket::deleteById($_GET['id']);

if (! $delete) {
    die('On a eu un problème');
}

header('Location: /');
