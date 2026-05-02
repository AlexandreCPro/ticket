<?php

requireAuth();

include ROOT.'/models/Ticket.php';
include ROOT.'/models/Statut.php';

$options = Statut::all();
$ticket = Ticket::getById($_GET['id']);

view('/ticket/edit', compact('ticket', 'options'));
