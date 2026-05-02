<?php

requireAuth();

<<<<<<< HEAD
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
=======
$options = Statut::all();

view('/ticket/new', compact('options'));
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
