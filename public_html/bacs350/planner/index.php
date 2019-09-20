<?php

    require_once 'views.php';


    // Read Markdown Text from file
    $content = render_markdown("Planner.md");
    $todo = render_markdown("ToDo.md");


    // Display the HTML in the page
    echo render_page('UNC BACS 350', "Matthew Bradow Project Planner", $content, &todo);
?>
