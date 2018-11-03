<?php

spl_autoload_register( function( $class_name ) {

    $file_name = 'classes/'.$class_name . '.php';
    if( file_exists( $file_name ) ) {
        require $file_name;
    }
} );

include 'includes/header.php';


$update = new People();

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $statement = $update->getPersonData($id);

    while ($row = $statement->fetch()) {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $address = $row['address'];
        $phone = $row['phone'];
    }
}

?>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="firstname">Ime:</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo  $firstname; ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Prezime:</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo  $lastname; ?>">
        </div>
        <div class="form-group">
            <label for="address">Adresa:</label>
            <input type="text" class="form-control" name="address" value="<?php echo  $address; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Telefon:</label>
            <input type="text" class="form-control" name="phone" value="<?php echo  $phone; ?>">
    </div>
        <input type="submit" class="btn btn-primary" name="updateSubmit" value="Submit">
    </form>
</div>

<?php

if(!empty($_POST)) {

    echo 'forma je uspješno poslana';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $update->updatePerson($id, $firstname, $lastname, $address, $phone);

}