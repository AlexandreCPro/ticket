<?php

// Page d'accueil publique — aucune authentification requise
// Si l'utilisateur est déjà connecté, on lui propose d'aller sur ses tickets
$sessionUser = Session::get('user');

view('home/index', ['sessionUser' => $sessionUser]);
