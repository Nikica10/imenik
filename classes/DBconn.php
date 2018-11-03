<?php

class DBconn
{

    //unutar klase atributima i metodama pristupam sa $this


    private $pdo;

    /**
     * DBconn constructor.
     */
    public function __construct()
    {
        /** @var Config $config */
        $config = new Config();

        try {
            $conn = new PDO("mysql:host=".$config->getHost().";dbname=".$config->getDb(), $config->getUsername(), $config->getPassword());
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $conn;
            return true;
        } catch (PDOException $e) {
            //echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    public function prepare($upit)
    {
        return $this->pdo->prepare($upit);
    }
}
