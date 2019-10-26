<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Log this page hit
    add_log($db, "bacs350/review/update.php page loaded");

    // Pick out the inputs fields: designer, url, report, score, date
    $designer = filter_input(INPUT_POST, 'designer');
    $url = filter_input(INPUT_POST, 'url');
    $report = filter_input(INPUT_POST, 'report');
    $score = filter_input(INPUT_POST, 'score');
    $date = filter_input(INPUT_POST, 'date');
        

    // Gather user input with a form
    if ($designer == '' || $url == '' || $report == '' || $score == '' || $date == '') {
        
        // Form view to add notes
        $id = filter_input(INPUT_GET, 'id');
        $review = get_review($db, $id);
        $edit_form = edit_review_form($review);

        // Display the HTML in the page
        echo render_page('UNC BACS 350', "Edit Review", $edit_form);
    }
    else {
        
        // Add record and return to list
        if (update_review($db, $designer, $url, $report, $score, $date, $id))
        {
            header("Location: index.php");
        };
    }
 
?>
