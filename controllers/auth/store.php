<?php

include ROOT.'/models/User.php';

$nom = $_POST['nom'] ?? '';
$pwd = $_POST['pwd'] ?? '';

$user = User::getByNom($nom);

if ($user && password_verify($pwd, $user['pwd'])) {
<<<<<<< HEAD
    Session::set('user', ['id' => $user['id'], 'nom' => $user['nom'], 'profil_id' => $user['profil_id'], 'agence_id' => $user['agence_id']]);
=======
    Session::set('user', ['id' => $user['id'], 'nom' => $user['nom']]);
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    header('Location: /');
    exit;
}

view('auth/login', ['erreur' => 'Identifiants incorrects.']);
