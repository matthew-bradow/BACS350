<?php
    /*
        Superhero Project Workshop
    */
    $site_title = 'UNC BACS 350';
    $page_title = "Superhero Gallery Project Notes";
    $content = '
        <p>
            Notes about the superhero project
        </p>
        <ul>
            <li>
                <a href="..">Other Projects</a>
            </li>
            <li>
                <a href="https://shrinking-world.com/unc/bacs350/project/03">Project Instructions</a>
            </li>
        </ul>
    ';
    include '../../views.php';
    echo render_page($site_title, $page_title, $content);
?>