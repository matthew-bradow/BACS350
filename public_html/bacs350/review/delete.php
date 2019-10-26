<?php

    // Connect to the database
    require_once 'review_db.php';

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Log this page hit
    add_log($db, "bacs350/review/delete.php page loaded");

    // Get the email of the record to delete
    $id = filter_input(INPUT_GET, 'id');

    // Attempt to remove the record
    delete_review($db, $id);

    // Return to the list
    header("Location: index.php");
?>
