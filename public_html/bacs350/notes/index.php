<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'notes_views.php';
    require_once 'notes_db.php';


    // List subscriber records
    $list = render_notes(list_notes ($db));

    
    // Button to go to other views
    $add_button = '<p><a class="button" href="insert.php">Add Note</a></p>';

    
    // Display the HTML in the page
    $intro = '
        <p>
            This page was created for Project #8 for the UNC BACS 350 class.
        </p>
         
    ';
    $content = "$intro $add_button $list";

    // Show the page
    echo render_page('UNC BACS 350', "Project 8 - Notes Database", $content);
?>
