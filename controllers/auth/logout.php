<?php

Session::get('user'); // démarre la session si nécessaire
session_destroy();

header('Location: /');
exit;
