<?php 
    // Access render_page from library
    require 'views.php';

    // Display the HTML with Style
    echo render_page('UNC BACS 350', "Subscriber List", $list);
?>

<h2>Subscribers Database - Step 2</h2>

<p>This page demonstrates a connection to an actual database at Bluehost.</p>
<p>The last output for this page should be a success confirmation. </p>


<?php

    // Connect to the subscribers database at Bluehost
    require 'subscriber.php';


    // Get a list of subscribers records
    $subscribers = query_subscribers($db);


    // Build a list of subscribers in HTML
    $list = render_subscriber_list($subscribers);

    echo $list;
    
?>

<p><b>Success !!</b></p>
