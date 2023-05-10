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
                self::$instance = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}
