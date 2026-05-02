<?php

include CORE.'Model.php';

class User extends Model
{
    public static ?string $table = 'users';

    public static function getByNom(string $nom): array|false
    {
        $stmt = self::getPdo()->prepare('SELECT * FROM users WHERE nom = :nom');
        $stmt->execute(['nom' => $nom]);

        return $stmt->fetch();
    }
}
