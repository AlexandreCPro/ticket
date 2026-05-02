<?php

requireAdmin();

include ROOT.'/models/Categorie.php';

$nom         = trim($_POST['nom_categorie'] ?? '');
$description = trim($_POST['description'] ?? '');

if ($nom === '') {
    view('categorie/new', ['erreur' => 'Le nom est obligatoire.']);
    exit;
}

Categorie::store([
    'nom_categorie' => $nom,
    'description'   => $description,
]);

header('Location: /categorie');
exit;
