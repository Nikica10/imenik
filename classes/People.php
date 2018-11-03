<?php

include 'includes/autoload.php';

class People
{

    private $conn;

    /**
     * People constructor.
     *
     */
    public function __construct()
    {
        //prilikom kreirana objekta u atribut conn spremam konekciju na bazu
        $this->conn = new DBconn();
    }


    public function findAll()
    {
        $statement = $this->conn->prepare("SELECT * FROM imenik");
        $statement->execute();
        //return $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement;
    }

    public function savePerson($firstname, $lastname, $address, $phone, $oib = NULL)
    {
            $statement = $this->conn->prepare("INSERT INTO imenik (first_name, last_name, address, phone) VALUES (:firstname, :lastname, :address, :phone)");

            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':lastname', $lastname);
            $statement->bindParam(':address', $address);
            $statement->bindParam(':phone', $phone);

            $statement->execute();
            //return $statement->setFetchMode(PDO::FETCH_ASSOC);
            return $statement;

    }


    public function getPersonData($id) {
        $statement = $this->conn->prepare("SELECT * FROM imenik WHERE id='$id'");
        $statement->bindParam(':firstname', $firstname);
        $statement->execute();
        return $statement;
    }

    public function updatePerson($id, $firstname, $lastname, $address, $phone) {
        $statement = $this->conn->prepare("UPDATE imenik SET first_name=:firstname, last_name=:lastname, address=:address, phone=:phone WHERE id='$id'");
        $statement->bindParam(':firstname', $firstname);
        $statement->bindParam(':lastname', $lastname);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':phone', $phone);

        $statement->execute();
    }

    public function deletePerson($id) {
        $stmt = $this->conn->prepare( "DELETE FROM imenik WHERE id='$id'");
        $stmt->execute();
    }

}