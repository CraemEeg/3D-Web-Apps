<?php

class Connection
{
    private static $instance;



    private function __construct()
    {
    }

    public static function getInstance($servername, $username, $password, $dbname)
    {

        if (!self::$instance) {
            try {

                $dsn = 'sqlite:./db/test5.db';

                self::$instance = new PDO($dsn, "user", "password");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}
