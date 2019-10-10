<?php

/*
    PHP Code for more efficient CRUD
*/


    // Include view rendering code
    require 'views.php';


    // Include all of the database code
    require 'subscribers.php';


    // Add explanation
    $intro = '<h1>Lesson 19</h1>
        <p>
            This page was updated as part of Lesson 19 - CRUD Functions for the UNC BACS 350 class.
        </p>';



    // Add one database record
    $name = 'Bogus Test user';
    $email = 'bogus_user@gmail.com';
    $subscribers = add_subscriber($db, $name, $email);
   

    // List subscriber records
    $content = render_subscribers(list_subscribers ($db));
    
    
    // Delete record to clean up bogus user
    delete_subscriber($db, $email);


    // Display the HTML in the page
    echo render_page('UNC BACS 350', "Subscriber List", $intro . $content);

?>
