<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';
    require_once 'review.php';


    // Log the page load
    log_page();


    // Display the page content
    $buttonbar = '<div><p>' . 
        render_button('Home', '..') .
        render_button('Show Log', 'pagelog.php') .
        render_button('Add Review', 'index.php?action=add') . 
        '</p></div>';


    // Dynamic UI
    $reviews = handle_review_actions();
    $user  = handle_auth_actions();


    // Text
    $text = '
    <h2>Project Reviews</h2>
    <p>
        This page was created for Project #9 for the UNCO BACS 350 class. It has been modified to include authentication.
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350",
        "page_title" => "Project #9 - Review Manager App", 
        'user'       => user_info(),
        "content"    => $buttonbar . $text . $reviews . $user);

    echo render_page($settings);

?>