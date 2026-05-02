<?php

requireAdmin();

include ROOT.'/models/Profil.php';
include ROOT.'/models/Agence.php';

$profils = Profil::all();
$agences = Agence::all();

view('user/new', compact('profils', 'agences'));
