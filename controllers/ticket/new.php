<?php

requireAuth();

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];

if ($profilId !== 3) {
    header('Location: /ticket');
    exit;
}

include ROOT.'/models/Categorie.php';

$categories = Categorie::all();
$options    = [];

view('/ticket/new', compact('options', 'profilId', 'categories'));
