<?php

requireAdmin();

include ROOT.'/models/User.php';

$id       = (int)($_GET['id'] ?? 0);
$nom      = trim($_POST['nom'] ?? '');
$pwd      = $_POST['pwd'] ?? '';
$profilId = (int)($_POST['profil_id'] ?? 0);
$agenceId = (int)($_POST['agence_id'] ?? 0);


$agenceRequise = $profilId !== 1;

$data = [
    'nom'       => $nom,
    'profil_id' => $profilId,
    'agence_id' => $agenceRequise ? ($agenceId ?: null) : null,
];

if ($pwd !== '') {
    $data['pwd'] = password_hash($pwd, PASSWORD_DEFAULT);
}

User::updateById($data, $id);

header('Location: /user');
exit;
