<?php

requireAdmin();

include ROOT.'/models/User.php';

$id = (int)($_GET['id'] ?? 0);

// Empêche de supprimer son propre compte
$currentUser = Session::get('user');
if ($id === (int)$currentUser['id']) {
    header('Location: /user');
    exit;
}

User::deleteById($id);

header('Location: /user');
exit;
