<?php

use \PDO;

class Database{
    protected static $db;

    public function __construct()
    {
        if (!self::$db instanceof \PDO) {
            self::$db = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
    }

    function select(string $sql, array $bindValues = array())
    {
        $req = self::$db->prepare($sql);
        $req->execute($bindValues);

        return $req->fetchAll();
    }

    function execute(string $sql, array $bindValues = array())
    {
        $req = self::$db->prepare($sql);
        $req->execute($bindValues);
        return self::$db->lastInsertId();
    }

}