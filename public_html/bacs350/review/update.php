<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';


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
