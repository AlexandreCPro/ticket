<?php

include CORE.'Model.php';

class Ticket extends Model
{
    public static ?string $table = 'tickets';

    public static function all(): array
    {
        $statement = self::getPdo()->query('
            SELECT tickets.*, statut.nom_statut
            FROM tickets
            JOIN statut ON tickets.idstatut = statut.id
        ');

    return $statement->fetchAll();
    }

    public static function getTitles(): array
    {
        $pdo = self::getPdo();

        $statment = $pdo->query('SELECT objet FROM tickets');

        return $statment->fetchAll();
    }
}
