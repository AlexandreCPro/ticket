<?php

requireAdmin();

include ROOT.'/models/Categorie.php';

$id        = (int)($_GET['id'] ?? 0);
$categorie = Categorie::getById($id);

if (!$categorie) {
    header('Location: /categorie');
    exit;
}

view('categorie/edit', compact('categorie'));
