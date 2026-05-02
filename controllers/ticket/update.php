<?php

requireAuth();

include ROOT.'/models/Ticket.php';

$sessionUser = Session::get('user');
$profilId    = (int)$sessionUser['profil_id'];
$id          = (int)($_GET['id'] ?? 0);
$ticket      = Ticket::getById($id);

if (!$ticket) {
    header('Location: /ticket');
    exit;
}

$idStatut    = (int)$ticket['idstatut'];
$idCategorie = (int)($_POST['idcategorie'] ?? 0) ?: null;

if ($profilId === 3) {
    if ($idStatut === 3) {
        $updt = Ticket::updateById([
            'objet'       => $_POST['objet'],
            'contenu'     => $_POST['contenu'],
            'idstatut'    => 4,
            'idcategorie' => $idCategorie,
        ], $id);
    } elseif ($idStatut === 1 || $idStatut === 2) {
        $updt = Ticket::updateById([
            'objet'       => $_POST['objet'],
            'contenu'     => $_POST['contenu'],
            'idstatut'    => $idStatut,
            'idcategorie' => $idCategorie,
        ], $id);
    } else {
        header('Location: /ticket');
        exit;
    }
} elseif ($profilId === 2) {
    $nouveauStatut = (int)$_POST['idstatut'];
    if ($nouveauStatut === 4) {
        $nouveauStatut = $idStatut;
    }
    $updt = Ticket::updateById([
        'objet'       => $ticket['objet'],
        'contenu'     => $ticket['contenu'],
        'idstatut'    => $nouveauStatut,
        'idcategorie' => $ticket['idcategorie'],
    ], $id);

    if ($nouveauStatut === 2) {
        Ticket::assign($id, (int)$sessionUser['id']);
    }
} else {
    $updt = Ticket::updateById([
        'objet'       => $_POST['objet'],
        'contenu'     => $_POST['contenu'],
        'idstatut'    => (int)$_POST['idstatut'],
        'idcategorie' => $idCategorie,
    ], $id);
}

if (!$updt) {
    die('On a eu un problème');
}

header('Location: /ticket');
