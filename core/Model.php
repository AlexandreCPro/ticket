<?php

class Model
{
    public static ?PDO $pdo = null;

    public static ?string $table = null;

    public static function getPdo(): PDO
    {
        if (is_null(self::$pdo)) {
            self::$pdo = new Pdo('mysql:host=localhost;dbname=ticket', 'root', '');
        }

        return self::$pdo;
    }

    public static function all()
    {
        $statment = self::getPdo()->query('SELECT * FROM '.static::$table);

        return $statment->fetchAll();
    }

    public static function getById($id)
    {
        $statment = self::getPdo()->prepare('SELECT * FROM '.static::$table.' WHERE id=:id');
        $statment->execute(['id' => $id]);

        return $statment->fetch();
    }

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

    public static function deleteById(int $id): bool
    {
        $sql = 'DELETE FROM '.static::$table.' WHERE id=:id';
        $statment = self::getPdo()->prepare($sql);

        return $statment->execute(['id' => $id]);
    }
}
