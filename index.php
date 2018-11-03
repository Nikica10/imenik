<?php
//session_start();
/*include 'classes/Config.php';
include 'classes/DBconn.php';
include 'classes/People.php';
include 'classes/User.php';
include 'classes/Request.php';*/

include 'includes/header.php';


$request = new Request($_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE);
$people = new People();
$user = new User();

$logged = $user->isLoggedIn($request->session);

$stmt = $people->findAll();
//$bla = $request->session;
//var_dump($bla); die();
?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ime</th>
                <th scope="col">Prezime</th>
                <th scope="col">Adresa</th>
                <th scope="col">Telefon</th>
            </tr>
        </thead>

<?php

while ( $row = $stmt->fetch() )
{
    ?>

    <tbody>
        <tr>
            <td><?php echo  $row['first_name']; ?></td>
            <td><?php echo  $row['last_name']; ?></td>
            <td><?php echo  $row['address']; ?></td>
            <td><?php echo  $row['phone']; ?></td>
            <?php if ($logged) { ?>
            <td><a href="updatePerson.php?id=<?php echo  $row['id']; ?>" type="button" class="btn btn-primary">Edit</a>
                <a href="deletePerson.php?id=<?php echo  $row['id']; ?>" type="button" class="btn btn-danger">Delete</a>
            </td>
            <?php } ?>
        </tr>


        <?php

}?>

        </tbody>
    </table>
<?php if($logged) { ?>
    <a href="addPerson.php" type="button" class="btn btn-primary">Add New Person</a>
<?php } ?>
</div>

<?php include 'includes/footer.php'; ?>










