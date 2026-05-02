<?php

requireAuth();

include ROOT.'/models/Categorie.php';

$categories = Categorie::all();
$sessionUser = Session::get('user');
$profilId = (int)$sessionUser['profil_id'];

view('categorie/index', compact('categories', 'profilId'));
