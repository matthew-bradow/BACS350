<?php
    require_once 'views.php';


    // Read Markdown Text from file
    $content = render_markdown("Teams.md");


    // Display the HTML in the page
    echo render_page('UNC BACS 350', "Project #4 - Project Teams", $content);

?>
