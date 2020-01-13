<?php


namespace Lib;

use PDO;

class DB
{
    private const Host = 'localhost';
    private const User = 'root';
    private const Password = '';
    private const Db = 'property_db';

    private static $connection;
    private static $settings = [

        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public static function connect($host = self::Host, $user = self::User, $password = self::Password, $db = self::Db)
    {
        if (!isset(self::$connection))
        {
            self::$connection = new PDO(
                'mysql:host=' . $host . ';dbname=' . 'property_db',
                $user,
                $password,
                self::$settings
            );
        }
    }

    public static function queryOne($query, $parameters=[])
    {
        $sql = self::$connection->prepare($query);
        $sql->execute($parameters);
        $results = $sql->fetch();

        return $results;
    }

    public static function queryAll($query, $parameters=[])
    {
        $sql = self::$connection->prepare($query);
        $sql->execute($parameters);
        $results = $sql->fetchAll();

        return $results;
    }
}