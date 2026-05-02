<?php

requireAdmin();

include ROOT.'/models/User.php';
include ROOT.'/models/Profil.php';
include ROOT.'/models/Agence.php';

$nom      = trim($_POST['nom'] ?? '');
$pwd      = $_POST['pwd'] ?? '';
$profilId = (int)($_POST['profil_id'] ?? 0);
$agenceId = (int)($_POST['agence_id'] ?? 0);

// L'agence est obligatoire pour les non-admins
$agenceRequise = $profilId !== 1;

if ($nom === '' || $pwd === '' || $profilId === 0 || ($agenceRequise && $agenceId === 0)) {
    $profils = Profil::all();
    $agences = Agence::all();
    view('user/new', ['profils' => $profils, 'agences' => $agences, 'erreur' => 'Tous les champs sont obligatoires.']);
    exit;
}

if (User::getByNom($nom)) {
    $profils = Profil::all();
    $agences = Agence::all();
    view('user/new', ['profils' => $profils, 'agences' => $agences, 'erreur' => 'Ce nom d\'utilisateur est déjà pris.']);
    exit;
}

$data = [
    'nom'       => $nom,
    'pwd'       => password_hash($pwd, PASSWORD_DEFAULT),
    'profil_id' => $profilId,
    'agence_id' => $agenceRequise ? $agenceId : null,
];

User::store($data);

header('Location: /user');
exit;
