<?php

/**
 * Détermine si l'URL courante correspond à l'une des routes fournies.
 *
 * Utilisé pour appliquer la classe CSS `active` sur les liens de navigation.
 *
 * @param  array<string> $routesPossibles Liste des chemins URL qui activent le lien.
 * @return string                         La chaîne 'active' ou une chaîne vide.
 */
function activeHeaderClass(array $routesPossibles): string
{
    return in_array($_SERVER['PATH_INFO'] ?? '', $routesPossibles) ? 'active' : '';
}

/**
 * Génère le HTML d'un élément de navigation Bootstrap.
 *
 * Applique automatiquement la classe `active` si l'URL courante
 * correspond à l'une des routes fournies.
 *
 * @param  array<string> $url   Tableau de chemins URL associés à ce lien ; le premier
 *                              élément est utilisé comme valeur de l'attribut href.
 * @param  string        $title Libellé affiché dans le lien.
 * @return string               Fragment HTML du <li> de navigation.
 */
function menuOption(array $url, string $title): string
{
    $classe = activeHeaderClass($url);

    return <<<EOM
        <li class="nav-item">
            <a class="nav-link $classe" href="$url[0]">$title</a>
        </li>
        EOM;
}

/**
 * Redirige vers la page de connexion si l'utilisateur n'est pas authentifié.
 *
 * À appeler en début de contrôleur pour protéger les actions réservées
 * aux utilisateurs connectés. Termine l'exécution après la redirection.
 *
 * @return void
 */
function requireAuth(): void
{
    if (!Session::keyExists('user')) {
        header('Location: /login');
        exit;
    }
}

/**
 * Rend une vue en l'encapsulant dans le layout principal.
 *
 * La vue est capturée via un tampon de sortie (output buffering), puis
 * injectée dans le layout via la variable $_content.
 * Les clés du tableau $parametres sont extraites comme variables locales
 * accessibles dans la vue.
 *
 * @param  string        $vue        Chemin relatif de la vue depuis le dossier views/,
 *                                   sans l'extension .php (ex. : 'article/index').
 * @param  array<string,mixed> $parametres Variables à transmettre à la vue (clé => valeur).
 * @return void
 */
function view(string $vue, array $parametres = []): void
{
    extract($parametres);

    ob_start();
    include VIEWS . $vue . '.php';
    $_content = ob_get_clean();
    include VIEWS . '/partials/layout.php';
}
