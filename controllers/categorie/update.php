<?php

requireAdmin();

include ROOT.'/models/Categorie.php';

$id          = (int)($_GET['id'] ?? 0);
$nom         = trim($_POST['nom_categorie'] ?? '');
$description = trim($_POST['description'] ?? '');

if ($nom === '') {
    $categorie = Categorie::getById($id);
    view('categorie/edit', ['categorie' => $categorie, 'erreur' => 'Le nom est obligatoire.']);
    exit;
}

Categorie::updateById([
    'nom_categorie' => $nom,
    'description'   => $description,
], $id);

header('Location: /categorie');
exit;
