<?php

include_once CORE.'Model.php';

class Statut extends Model
{
    public static ?string $table = 'statut';

    public static function all()
    {
        $statement = self::getPdo()->query('SELECT * FROM '.static::$table);
        return $statement->fetchAll();
    }
}