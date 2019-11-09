<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'Matthew Bradow - UNC BACS 350';
    
    $page_title = "Matthew Bradow Home Page";
    
    $content = '
        <p>
            <a href="..">Home</a>
        </p>
        <img src="images/profilePicture.jpg" style="width:200px;" alt="profile picture">
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
                <a href="https://shrinking-world.com/unc/bacs350">Sensei Home Page</a>
            </li>
            <li>
                <a href="https://unco.instructure.com">Canvas</a>
            </li>
            <li>
                <a href="https://github.com/matthew-bradow/BACS350">Github Repo</a>
            </li>
            <li>
                <a href="https://github.com/Mark-Seaman/UNC-BACS350-Demo">Instructor Repo</a>
            </li>
        </ul>
    ';

//    include 'views.php';
//    
//    echo render_page($site_title, $page_title, $content);

    // Display the page content
    require_once 'views.php';

    $skills   = render_card("Skills", render_skills());
    $projects = render_card("Projects", render_projects());

    $secondContent = "$content $skills $projects";


    // Create main part of page content
    $settings = array(
        "site_title" => "Matthew Bradow - UNC BACS 350",
        "page_title" => "Matthew Bradow Home Page", 
        "logo"       => "Logo.png",
        "style"      => 'unc.css',
        "content"    => $secondContent);

    echo render_page($settings);

?>
