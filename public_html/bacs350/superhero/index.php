<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'superhero_views.php';
    require_once 'superhero_db.php';


    // List superhero records
    $list = render_superheroes(list_superheroes ($db));

    
    // Button to go to other views
    $add_button = '<p><a class="button" href="insert.php">Add Superhero</a></p>';

    
    $intro = '
        <a href="/bacs350">Home Page</a>
        <p>
            This page was created for Project #7 for the UNC BACS 350 class.
        </p>
    ';
    $content = "$intro $add_button $list";

    // Show the page
    echo render_page('UNC BACS 350', "Superhero Registration App", $content);
?>
