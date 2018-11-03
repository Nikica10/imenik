<?php

spl_autoload_register( function( $class_name ) {

    $file_name = 'classes/'.$class_name . '.php';
    if( file_exists( $file_name ) ) {
        require $file_name;
    }
} );

$user = new User();
$request = new Request($_GET, $_POST, $_SERVER);

if ($request->checkIfUserSubmitted()) {

    $user->userRegistration(
            $request->post['firstname'],
            $request->post['lastname'],
            $request->post['username'],
            $request->post['password']
    );
    header('Location: login.php');
}

include 'includes/header.php';
?>

<div class="container col-sm-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="firstname">Ime:</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Prezime:</label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="form-group">
            <label for="address">Korisničko Ime:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="phone">Lozinka</label>
            <input type="text" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
</div>
