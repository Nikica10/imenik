<?php
include 'includes/session.php';
include 'includes/autoload.php';
$user = new User();
$request = new Request($_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE); // uvijek kreiraj request makar s praznim super globalnim varijablama

if ($request->checkIfUserSubmitted()) {

    if (!empty($request->post['remember'])) {

        $cookie_user = "user";
        $cookie_user_value = $request->post['username'];
        setcookie($cookie_user, $cookie_user_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        $cookie_password = "password";
        $cookie_password_value = $request->post['password'];
        setcookie($cookie_password, $cookie_password_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    }

    $user->userLogIn(
        $request->post['username'],
        $request->post['password']
    );


    header('Location: index.php');
}

include 'includes/header.php';
?>

<div class="container col-sm-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="address">Korisničko Ime:</label>
            <input type="text" class="form-control" name="username" value="<?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?>">
        </div>
        <div class="form-group">
            <label for="phone">Lozinka</label>
            <input type="text" class="form-control" name="password" value="<?php if (isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Zapamti Lozinku</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
</div>
