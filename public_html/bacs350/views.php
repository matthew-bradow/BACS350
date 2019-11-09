<?php

    /*
        render_page -- build a page with custom settings
    */

//                    
//    function render_page($site_title, $page_title, $content) {
//        
//        return '
//            <!DOCTYPE html>
//            <html lang="en">
//                <head>
//
//                    <meta charset="UTF-8">
//                    <title>' . $page_title . '</title>
//
//                    <link rel="icon" href="/bacs350/images/myFavicon.png">
//                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
//                    <link rel="stylesheet" href="/bacs350/unc.css">
//
//                </head>
//                <body>
//                
//                    <header>
//                        <div class="container-fluid">
//                            <div class="row">
//                                <div class="col-sm-8">
//                                    <h1>' . $site_title . '</h1>
//                                    <h2>' . $page_title . '</h2>
//                                </div>
//                                <div class="logo col-sm-4">
//                                    <div class="pull-right">
//                                        <img class="img-rounded img-responsive" 
//                                        src="/bacs350/images/Bear.200.png" 
//                                        alt="UNC Bear" width="150">
//                                    </div>
//                                </div>
//                            </div>
//                        </div>
//                    </header>
//
//                    <main>
//
//                        ' . $content . '
//
//                    </main>
//                </body>
//            </html>
//        ';
//
//    }

    // render_button -- Show a styled button
    function render_button($text, $url) {
        return '<button class="btn">' . render_link($text, $url) . '</button>';
    }


    // render_card -- create HTML for visual card
    function render_card($title, $body) {
        $settings = array('title' => $title, 'body' => $body);
        return render_template('templates/card.html', $settings);
    }  


    // render_skills -- show the skills template
    function render_skills($title, $body) {
        return render_template('templates/skills.html', array());
    }  

    // render_projects -- show the projects template
    function render_projects($title, $body) {
        return render_template('templates/projects.html', array());
    }  


    // render_link -- Create a hyperlink in HTML
    function render_link($text, $url) {
        return "<a href=\"$url\">$text</a>";
    }

    
    // render_page -- Create one HTML page from a template.
    function render_page($settings) {
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        return render_template("templates/page.html", $settings);
    }


    // render_template -- Convert template file using the settings
    function render_template($template, $settings) {
        $text = file_get_contents($template); 
        $text = transform_text($text, $settings);
        return $text;
    }

   
    // transform_text -- Convert each setting in a block of text
    function transform_text ($text, $settings) {
        foreach ($settings as $key => $value) {
            $text = str_replace("{{ $key }}",  $value,  $text);
        }
        return $text;
    }

?>
