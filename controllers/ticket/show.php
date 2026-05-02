<?php

include ROOT.'/models/Ticket.php';

$ticket = Ticket::getById($_GET['id']);

view('/ticket/show', compact('ticket'));