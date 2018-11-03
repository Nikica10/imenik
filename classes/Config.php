<?php
//session_start();


class Config
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "imenik_db";

    public function dump($x)
    {
        echo '<pre>';
        var_dump($x);
        echo '</pre>';
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDb()
    {
        return $this->db;
    }



}

