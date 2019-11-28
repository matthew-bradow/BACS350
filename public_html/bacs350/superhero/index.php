<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';
    require_once 'superhero.php';


    // Log the page load
    log_page();


    // Display the page content
    $buttonbar = '<div><p>' . 
        render_button('Home', '..') .
        render_button('Show Log', 'pagelog.php') .
        render_button('Add Superhero', 'index.php?action=add') . 
        '</p></div>';


    // Dynamic UI
    $superheroes = handle_superhero_actions();
    $user  = handle_auth_actions();


    // Text
    $text = '
    <h2>Superhero List</h2>
    <p>
        This page was created for Project #7 for the UNC BACS 350 class. It has been modified to include authentication.
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Superhero Registration App", 
        'user'       => user_info(),
        "content"    => $buttonbar . $text . $superheroes . $user);

    echo render_page($settings);

?>