<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Log this page hit
    add_log($db, "bacs350/review/index.php page loaded");

    // List review records
    $list = render_reviews(list_reviews($db));

    
    // Button to go to other views
    $add_button = '<p><a class="button" href="insert.php">Add Review</a></p>
    <p>
        <a href="index.php">Refresh Index Page</a>
    </p>
    <p>
        <a href="log-history.php">Show Log History</a>
    </p>
    <p>
        <a href="clear.php">Clear Log History</a>
    </p>';

    

    // Show the page
    $content = "$add_button $list";
    echo render_page('UNC BACS 350', "Project #9 - Review Manager App", $content);
?>