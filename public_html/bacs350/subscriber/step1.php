<?php 
    // Access render_page from library
    require 'views.php';

    // Display the HTML with Style
    echo render_page('UNC BACS 350', "Subscriber List", $list);
?>

<h2>Subscriber Database - Step 1</h2>

<p>This page demonstrates a connection to an actual database at Bluehost.</p>
<p>This is the expanded and instrumented code.</p>
<p>Once the database is connect a list of subscribers is obtained and converted into HTML.</p>

<p>
    <a href="index.php">Subscriber List Code</a>
</p>

<h3>CONNECT to Subscriber Database</h3>

<?php

    // Connect subscriber database
    $port = '3306';
    $dbname = 'atthewb6_subscribers';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    $username = 'atthewb6_test';
    $password = 'BACS_350';
    
    echo "<h3>$db_connect</h3>";
    
    $db = new PDO($db_connect, $username, $password);

    echo "<h3>CONNECTED</h3>";


    // Get a list of records into an array
    $query = "SELECT * FROM subscribers";
    $statement = $db->prepare($query);
    $statement->execute();
    $subscribers = $statement->fetchAll();

    echo "<h3>QUERY DONE</h3>";

    // Create an HTML list on the output
    echo '<ul>';
    foreach($subscribers as $row) {
        echo "<li><b>$row[NAME]</b> - email: $row[email]</li>";
    }
    echo '</ul>';

    echo "<h3>LIST CREATED</h3>";

?>
