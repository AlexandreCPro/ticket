<?php

requireAdmin();

include ROOT.'/models/Categorie.php';

Categorie::deleteById((int)($_GET['id'] ?? 0));

header('Location: /categorie');
exit;
