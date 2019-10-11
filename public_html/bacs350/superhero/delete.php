<?php

    // Connect to the database
    require_once 'superhero_db.php';

    // Get the id of the record to delete
    $id = $_GET['id'];

    // Attempt to remove the record
    delete_superhero($db, $id);

    // Return to the list
    header("Location: index.php");
?>
