<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';
    require_once 'note.php';


    // Log the page load
    log_page();


    // Display the page content
    $buttonbar = '<div><p>' . 
        render_button('Home', '..') .
        render_button('Show Log', 'pagelog.php') .
        render_button('Add Note', 'index.php?action=add') . 
        '</p></div>';


    // Dynamic UI
    $notes = handle_notes_actions();
    $user  = handle_auth_actions();


    // Text
    $text = '
    <h2 style="color: white;">Notes List</h2>
    <p style="color: white;">
        This page was created for Project #8 for the UNCO BACS 350 class. It has been modified to include authentication.
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Demo 34 - Notes with User Auth", 
        'user'       => user_info(),
        "content"    => $buttonbar . $text . $notes . $user);

    echo render_page($settings);

?>
