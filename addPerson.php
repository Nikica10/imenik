<?php
include 'classes/People.php';
include 'includes/header.php';


$people = new People();


if(!empty($_POST)) {

    //echo 'forma je uspješno poslana';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $people->savePerson($firstname, $lastname, $address, $phone);

    header('Location: index.php?send=true');

}
 
?>

<form action="addPerson.php" method="post">
  <fieldset>
    <legend>Personal information:</legend>
    First name:<br>
    <input type="text" name="firstname"><br>
    Last name:<br>
    <input type="text" name="lastname"><br>
    Address:<br>
    <input type="text" name="address"><br>
    Phone:<br>
    <input type="text" name="phone"><br><br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
</form>

