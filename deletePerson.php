<?php

include 'classes/People.php';

$delete = new People();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete->deletePerson($id);
    echo 'Person Is Deleted';
}

