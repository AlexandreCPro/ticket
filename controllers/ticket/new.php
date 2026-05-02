<?php

requireAuth();

$options = Statut::all();

view('/ticket/new', compact('options'));
