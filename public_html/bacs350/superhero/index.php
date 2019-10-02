<?php
    /*
        Superhero Project Workshop
    */

    // Get the render_page and render_card functions
    include 'views.php';

    // Set custom settings
    $site_title = 'UNC BACS 350';
    $page_title = 'Superhero Gallery';

    $card1 = render_card("Spider-Man", "
        <p>Your friendly neighborhood superhero.</p>
        <img src='https://upload.wikimedia.org/wikipedia/en/2/21/Web_of_Spider-Man_Vol_1_129-1.png' style='width:200px;'>
        <h6>Image source: Wikipedia</h6>
        <p>Spider-Man (Peter Parker) is a 15 year old from Queens. He was bitten by a radioactive spider and now protects New York City from the crimes he feels he has a responsibility to stop.</p>
        ");
    $card2 = render_card("Iron Man", "
        <p>Genius, Billionaire, Playboy, Philanthropist.</p>
        <img src='https://upload.wikimedia.org/wikipedia/en/e/e0/Iron_Man_bleeding_edge.jpg' style='width:200px;'>
        <h6>Image source: Wikipedia</h6>
        After Iron Man (Tony Stark) was kidnapped and sustained a chest injury, he built an Iron Man suit and escaped. He later continued to build more powerful and weaponized suits in order to protect himself and others.</p>
        ");
    $card3 = render_card("Superman", "
        <p>Defender of Earth</p>
        <img src='https://upload.wikimedia.org/wikipedia/en/3/35/Supermanflying.png' style='width:200px;'>
        <h6>Image source: Wikipedia</h6>
        <p>Superman (Clark Kent) was born on the planet Krypton. After his parents sent him to earth as a baby, he grew up on Earth and developed a plethora of powers, including flight and super strength.</p>
        ");
    

    $content =  '
        <h2>PROJECT #3: Superhero Gallery</h2>
        <div class="container-fluid">
            <div class="row">
                ' . $card1 . $card2 . '
                ' . $card3 . '
            </div>
        </div>
        <h1>Database Connection</h1>
        <p>
            This code shows how to make connections to the database from PHP code.
        </p>


        <ul>
            <li><a href="bluehost.php">Bluehost Database</a></li>
            <li><a href="local.php">Local Database</a></li>
        </ul>


        <p>
            To learn how to create one piece of logic that can connect to either a Bluehost database or a local database, study the code in **bacs350/demo/16/db.php**.
        </p>
    ';

    // Create HTML and output the page
    echo render_page($site_title, $page_title, $content);
?>