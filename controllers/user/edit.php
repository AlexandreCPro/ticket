<?php

requireAdmin();

include ROOT.'/models/User.php';
include ROOT.'/models/Profil.php';
include ROOT.'/models/Agence.php';

$id   = (int)($_GET['id'] ?? 0);
$user = User::getById($id);

if (!$user) {
    header('Location: /user');
    exit;
}

$profils = Profil::all();
$agences = Agence::all();

view('user/edit', compact('user', 'profils', 'agences'));
