<?php

include ROOT.'/models/User.php';

$nom = $_POST['nom'] ?? '';
$pwd = $_POST['pwd'] ?? '';

$user = User::getByNom($nom);

if ($user && password_verify($pwd, $user['pwd'])) {
    Session::set('user', ['id' => $user['id'], 'nom' => $user['nom']]);
    header('Location: /');
    exit;
}

view('auth/login', ['erreur' => 'Identifiants incorrects.']);
