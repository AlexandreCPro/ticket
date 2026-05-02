<?php

<<<<<<< HEAD
class Model
{
    public static ?PDO $pdo = null;

    public static ?string $table = null;

=======
/**
 * Classe de base pour tous les modèles de l'application.
 *
 * Fournit les opérations CRUD génériques via PDO. Chaque modèle
 * enfant doit surcharger la propriété statique {@see Model::$table}
 * avec le nom de la table MySQL correspondante.
 *
 * @package Core
 */
class Model
{
    /**
     * Instance PDO partagée entre tous les modèles (singleton).
     *
     * @var PDO|null
     */
    public static ?PDO $pdo = null;

    /**
     * Nom de la table MySQL associée au modèle.
     *
     * Doit être surchargé dans chaque classe enfant.
     *
     * @var string|null
     */
    public static ?string $table = null;

    /**
     * Retourne (ou crée) la connexion PDO partagée.
     *
     * La connexion est établie en lazy loading : elle n'est créée
     * qu'au premier appel et réutilisée ensuite.
     *
     * @return PDO
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function getPdo(): PDO
    {
        if (is_null(self::$pdo)) {
            self::$pdo = new Pdo('mysql:host=localhost;dbname=ticket', 'root', '');
        }

        return self::$pdo;
    }

<<<<<<< HEAD
=======
    /**
     * Retourne toutes les lignes de la table.
     *
     * @return array Tableau indexé de tableaux associatifs représentant chaque ligne.
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function all()
    {
        $statment = self::getPdo()->query('SELECT * FROM '.static::$table);

        return $statment->fetchAll();
    }

<<<<<<< HEAD
=======
    /**
     * Retourne une ligne identifiée par sa clé primaire.
     *
     * @param  int|string $id Identifiant de la ressource.
     * @return array|false    Tableau associatif de la ligne, ou false si introuvable.
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function getById($id)
    {
        $statment = self::getPdo()->prepare('SELECT * FROM '.static::$table.' WHERE id=:id');
        $statment->execute(['id' => $id]);

        return $statment->fetch();
    }

<<<<<<< HEAD
=======
    /**
     * Insère une nouvelle ligne dans la table.
     *
     * Les clés du tableau correspondent aux noms des colonnes.
     *
     * @param  array $row Données à insérer (colonne => valeur).
     * @return bool       True en cas de succès, false sinon.
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function store(array $row): bool
    {
        $fields = [];
        $params = [];

        $fields = implode(', ', array_keys($row));

        foreach (array_keys($row) as $key) {
            $params[] = ":$key";
        }
        $params = implode(', ', $params);

        $sql = 'INSERT INTO '.static::$table." ($fields) VALUES ($params)";
        $statment = self::getPdo()->prepare($sql);

        return $statment->execute($row);
    }
<<<<<<< HEAD

=======
    
    /**
     * Met à jour une ligne identifiée par sa clé primaire.
     *
     * @param  array $row Colonnes à modifier (colonne => valeur).
     * @param  int   $id  Identifiant de la ressource à modifier.
     * @return bool       True en cas de succès, false sinon.
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function updateById(array $row, int $id): bool
    {
        $params = [];

        foreach (array_keys($row) as $key) {
            $params[] = "$key=:$key";
        }
        $params = implode(', ', $params);

        $sql = 'UPDATE '.static::$table." SET $params WHERE id=:id";
        $statment = self::getPdo()->prepare($sql);

        return $statment->execute(array_merge($row, ['id' => $id]));
    }

<<<<<<< HEAD
=======
    /**
     * Supprime une ligne identifiée par sa clé primaire.
     *
     * @param  int $id Identifiant de la ressource à supprimer.
     * @return bool    True en cas de succès, false sinon.
     */
>>>>>>> f0abff02462bb8d21725cbc000d603610d061a6d
    public static function deleteById(int $id): bool
    {
        $sql = 'DELETE FROM '.static::$table.' WHERE id=:id';
        $statment = self::getPdo()->prepare($sql);

        return $statment->execute(['id' => $id]);
    }
}
