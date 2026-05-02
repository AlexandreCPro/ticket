<?php

function activeHeaderClass(array $routesPossibles): string
{
    return in_array($_SERVER['PATH_INFO'] ?? '', $routesPossibles) ? 'active' : '';
}

function menuOption(array $url, string $title): string
{
    $classe = activeHeaderClass($url);

    return <<<EOM
        <li class="nav-item">
            <a class="nav-link $classe" href="$url[0]">$title</a>
        </li>
        EOM;
}

function requireAuth(): void
{
    if (!Session::keyExists('user')) {
        header('Location: /login');
        exit;
    }
}

function requireAdmin(): void
{
    requireAuth();
    $user = Session::get('user');
    if (!$user || (int)$user['profil_id'] !== 1) {
        header('Location: /');
        exit;
    }
}

function view(string $vue, array $parametres = []): void
{
    extract($parametres);

    ob_start();
    include VIEWS . $vue . '.php';
    $_content = ob_get_clean();
    include VIEWS . '/partials/layout.php';
}
