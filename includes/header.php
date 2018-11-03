<!DOCTYPE html>
<html>
<head>
    <title>Imenik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Imenik</a>
    <?php

        include 'includes/session.php';
        include 'includes/autoload.php';

        $username = new User();
        $request = new Request($_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE);

    ?>

    <?php if ($username->isLoggedIn($request->session)) { ?>

        <nav class="navbar navbar-light bg-light">
            <span class="navbar-text">
                Welcome <?php $username->username($request->session); ?>
            </span>
        </nav>

        <a class="navbar-brand text-right" href="logout.php">Logout</a>

    <?php } else { ?>

        <nav class="navbar-brand text-right" >
            <a class="navbar-brand text-right" href="login.php">Login</a>
            <a class="navbar-brand text-right" href="register.php">Register</a>
        </nav>

    <?php } ?>

</nav>

<?php

if (isset($request->get['send']) && $request->get['send'] == 'true') { ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <?php echo 'Vaša Osoba Je Unešena.'; ?>
        </div>
    </div>

<?php } ?>



