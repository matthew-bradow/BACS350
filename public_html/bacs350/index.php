<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "Matthew's Brain";
    
    $content = '
        <p>
            <a href="..">Home</a>
        </p>
        <img src="images/profilePicture.jpg" style="width:200px;">
        <p>
            Matthew Bradow is a Junior at the University of Colorado. He is currently pursuing a Bachelor of Science degree in Software Engineering as well as a Music minor and Music Technology certificate.
        </p>
        <p> 
            This page is the beginning of an ongoing project in BACS 350.
        </p>
        <p> 
            It is a custom information manager.
        </p>
        <p> 
            Different rooms within this PHP app will contain different types of info.
        </p>
        
        <ul>
            <li>
                <a href="demo">Code Demos</a>
            </li>
            <li>
                <a href="pattern">Design Patterns</a>
            </li>
            <li>
                <a href="project">Projects</a>
            </li>
            <li>
                <a href="superhero">Superhero Profiles</a>
            </li>
        </ul>
    ';

    include 'views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
