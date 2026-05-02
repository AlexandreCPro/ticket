<?php

include_once CORE.'Model.php';

class Ticket extends Model
{
    public static ?string $table = 'tickets';

    private static string $joinTech = '
        LEFT JOIN assignation ON assignation.idtickets = tickets.id
        LEFT JOIN users AS technicien ON technicien.id = assignation.iduser
    ';

    public static function all(): array
    {
        $stmt = self::getPdo()->query('
            SELECT tickets.*, statut.nom_statut, technicien.nom AS tech_nom,
                   categories.nom_categorie
            FROM tickets
            JOIN statut ON tickets.idstatut = statut.id
            LEFT JOIN categories ON tickets.idcategorie = categories.id'
            . self::$joinTech . '
            ORDER BY tickets.id DESC
        ');
        return $stmt->fetchAll();
    }

    public static function allForTechnicien(int $agenceId): array
    {
        $stmt = self::getPdo()->prepare('
            SELECT tickets.*, statut.nom_statut, technicien.nom AS tech_nom,
                   categories.nom_categorie
            FROM tickets
            JOIN statut ON tickets.idstatut = statut.id
            JOIN users   ON tickets.iduser   = users.id
            LEFT JOIN categories ON tickets.idcategorie = categories.id'
            . self::$joinTech . '
            WHERE users.agence_id = :agence_id
            ORDER BY tickets.id DESC
        ');
        $stmt->execute(['agence_id' => $agenceId]);
        return $stmt->fetchAll();
    }

    public static function allForUtilisateur(int $userId): array
    {
        $stmt = self::getPdo()->prepare('
            SELECT tickets.*, statut.nom_statut, categories.nom_categorie
            FROM tickets
            JOIN statut ON tickets.idstatut = statut.id
            LEFT JOIN categories ON tickets.idcategorie = categories.id
            WHERE tickets.iduser = :user_id
            ORDER BY tickets.id DESC
        ');
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public static function getById($id): array|false
    {
        $stmt = self::getPdo()->prepare('
            SELECT tickets.*, statut.nom_statut, technicien.nom AS tech_nom,
                   categories.nom_categorie
            FROM tickets
            JOIN statut ON tickets.idstatut = statut.id
            LEFT JOIN categories ON tickets.idcategorie = categories.id'
            . self::$joinTech . '
            WHERE tickets.id = :id
        ');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function assign(int $ticketId, int $techId): void
    {
        $pdo = self::getPdo();
        $del = $pdo->prepare('DELETE FROM assignation WHERE idtickets = :idtickets');
        $del->execute(['idtickets' => $ticketId]);
        $ins = $pdo->prepare('INSERT INTO assignation (iduser, idtickets) VALUES (:iduser, :idtickets)');
        $ins->execute(['iduser' => $techId, 'idtickets' => $ticketId]);
    }

    public static function getTitles(): array
    {
        $stmt = self::getPdo()->query('SELECT objet FROM tickets');
        return $stmt->fetchAll();
    }
}
