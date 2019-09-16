<?php

    /*
        Create page content with a template.
    */

    $site_title = "Matthew Bradow";
    
    $page_title = 'BACS 350 Code Workshop';

    $content = '
        <p>
            <a href="/bacs350">Home</a>
        </p>
        <p> 
            <img src="/bacs350/images/profilePicture.jpg" alt="Matthew Bradow" style="width: 200px;"></img>
        </p>
        
        <h3>Code</h3>
        
        <ul>
            <li>
                <a href="/bacs350/demo">My Code Demos</a>
            </li>
            <li>
                <a href="/bacs350/pattern">My Design Patterns</a>
            </li>
            <li>
                <a href="/bacs350/project">My Projects</a>
            </li>
        </ul>
        
        <h3>Web Services</h3>
        
        <ul>
            <li>
                <a href="https://www.unco.edu/canvas/">Canvas</a>
            </li>
            <li>
                <a href="https://matthewbradowwebdesign.com">WordPress site</a>
            </li>
            <li>
                <a href="https://unco-bacs.org/bacs350">My Home Page</a>
            </li>
            <li>
                <a href="https://shrinking-world.com/unc/bacs350">Sensei Server</a>
            </li>
            <li>
                <a href="https://github.com/matthew-bradow/UNC-BACS350-2019-Fall">Github Repo</a>
            </li>
        </ul>
        
        
    ';

    include '../../views.php';

    echo render_page($site_title, $page_title, $content);

?>
