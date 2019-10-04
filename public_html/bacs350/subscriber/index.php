<?php 
    // Access render_page from library
    require 'views.php';

    // Display the HTML with Style
    echo render_page('UNC BACS 350', "Subscriber List", $list);
?>

<h2>Subscriber List</h2>

<p>This page demonstrates a connection to an actual database at Bluehost.</p>

<h3>Step 1 - Simple page</h3>

<p>
    <b></b> Start by building and debugging a page that looks like this one.
    Get this working first!
</p>
<p>
    <a href="step1.php">Subscribers Page</a>
</p>

<h3>Step 2 - Normal page</h3>

<p>
    The simple solution will duplicate a lot of code
    on a real website so it is not suitable for production websites. Build functions
    for all of the key operations that should be done.
</p>
<p>
    <a href="step2.php">Subscribers Page</a>
</p>
