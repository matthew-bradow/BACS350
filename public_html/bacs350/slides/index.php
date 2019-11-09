<?php

    require_once 'log.php';
    require_once 'slides.php';
    require_once 'views.php';


    // Log the page load
    log_page();


    // Display the page content
    $content = '<div><p>';
    $content .= render_button('Home', '../index.php');
    $content .= render_button('Show Log', 'pagelog.php');
    $content .= render_button('Add Slide Show', 'index.php?action=add');
    $content .= '</p></div>';
    $content .= handle_actions();


    // Create main part of page content
    $settings = array(
        "site_title" => "Project #11",
        "page_title" => "Slide Show App",
        "logo"       => "../images/Logo.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
