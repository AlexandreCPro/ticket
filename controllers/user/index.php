<?php

requireAdmin();

include ROOT.'/models/User.php';

$users = User::allWithProfil();

view('user/index', compact('users'));
