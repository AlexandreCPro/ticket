<?php

include_once CORE.'Model.php';

class User extends Model
{
    public static ?string $table = 'users';

    public static function getByNom(string $nom): array|false
    {
        $stmt = self::getPdo()->prepare('SELECT * FROM users WHERE nom = :nom');
        $stmt->execute(['nom' => $nom]);

        return $stmt->fetch();
    }

    public static function allWithProfil(): array
    {
        $stmt = self::getPdo()->query(
            'SELECT users.*, profils.nomprofil, agences.nom_agence FROM users
             LEFT JOIN profils ON users.profil_id = profils.id
             LEFT JOIN agences ON users.agence_id = agences.id
             ORDER BY users.id'
        );
        return $stmt->fetchAll();
    }
}
