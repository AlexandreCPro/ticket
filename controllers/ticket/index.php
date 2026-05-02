<?php

// CONTROLEUR
include ROOT.'/models/Ticket.php';

$retourSQL = Ticket::all();

view('ticket/index', compact('retourSQL')); // ['retourSQL'=>$retourSQL]