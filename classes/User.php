<?php

class User
{
    private $conn;


    /**
     * User constructor.
     */
    public function __construct() {
        $this->conn = new DBconn();
    }

    public function userRegistration($firstname, $lastname, $username, $password) {
        $statement = $this->conn->prepare("INSERT INTO users (first_name, last_name, username, password) VALUES (:firstname, :lastname, :username, :password)");
        $statement->bindParam(':firstname', $firstname);
        $statement->bindParam(':lastname', $lastname);
        $statement->bindParam(':username', $username);
        $encryptedPassword = $this->hashPasswordd($password);
        $statement->bindParam(':password', $encryptedPassword);

        $statement->execute();

        return $statement;  // Zakaj???????
    }

    public function userLogIn($username, $password)
    {
        $encryptedPassword = $this->hashPasswordd($password);

        $statement = $this->conn->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $encryptedPassword);

        $statement->execute();

        $row = $statement->fetch();

        if ( $statement->rowCount() == 1 ) {
            $_SESSION['userId'] = $row['id'];
            $_SESSION['username'] = $row['username'];
        }else{
            echo 'Loged In Faild';
        }

    }

    private function hashPasswordd($password)
    {
        return md5($password);
    }

    public function isLoggedIn($session)
    {
        if(isset($session['userId']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function username($session) {
        if (isset($session['username'])) {
            echo $session['username'];
        }
    }


}

//-------------------
// metoda get username
// atribut logedin - true folse
// u Request klasu dodaj još $_COOKIE
