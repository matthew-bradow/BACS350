<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';
    require_once 'views.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_review() {
        global $db;

        // Pick out the inputs
        $designer = filter_input(INPUT_POST, 'designer');
        $url = filter_input(INPUT_POST, 'url');
        $report = filter_input(INPUT_POST, 'report');
        $score = filter_input(INPUT_POST, 'score');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($designer) && !empty($url) && !empty($report) && !empty($score) && !empty($date)) {

            try {
                $query = "INSERT INTO reviews (designer, url, report, score, date) VALUES (:designer, :url, :report, :score, :date)";
                $statement = $db->prepare($query);
                $statement->bindValue(':designer', $designer);
                $statement->bindValue(':url', $url);
                $statement->bindValue(':report', $report);
                $statement->bindValue(':score', $score);
                $statement->bindValue(':date', $date);
                $statement->execute();
                $statement->closeCursor();

                log_event('Review CREATE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Lookup Record using ID
    function get_review($id) {
        global $db;

        try {
            $query = "SELECT * FROM reviews WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();

            log_event('Review READ');                       // READ
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Query for all reviews
    function list_reviews () {
        global $db;

        try {
            $query = "SELECT * FROM reviews";
            $statement = $db->prepare($query);
            $statement->execute();

            log_event('Review READ');                       // READ
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Delete Database Record
    function delete_review() {
        $id = filter_input(INPUT_POST, 'id');
        if (!empty($id)) {
            try {
                $query = "DELETE from reviews WHERE id = :id";
                global $db;
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

                log_event('Review DELETE');                     // DELETE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Update the database
    function update_review () {
        global $db;

        // Pick out the inputs
        $designer = filter_input(INPUT_POST, 'designer');
        $url = filter_input(INPUT_POST, 'url');
        $report = filter_input(INPUT_POST, 'report');
        $score = filter_input(INPUT_POST, 'score');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($designer) && !empty($url) && !empty($report) && !empty($score) && !empty($date)) {

            try {
                // Modify database row
                $query = "UPDATE reviews SET designer=:designer, url=:url, report=:report, score=:score, date=:date WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':designer', $designer);
                $statement->bindValue(':url', $url);
                $statement->bindValue(':report', $report);
                $statement->bindValue(':score', $score);
                $statement->bindValue(':date', $date);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

                log_event('Review UPDATE');                     // UPDATE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    /* ---------------------------
                V I E W
     --------------------------- */

    // Create an HTML list on the output
    function review_list_view($reviews) {
        $html = '';
        foreach($reviews as $row) {
            $html .= render_template('review.html', $row);
        }
        return $html;
    }


    // add_review_form -- Create an HTML form to add record.
    function add_review_view() {
        log_event('Review Add View');                   // Add View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page);        
        return render_template('review_add.html', array());
    }


    // Show form for adding a record
    function edit_review_view($record) {
        log_event('Review Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('review_edit.html', $record);
    }


    // Show form for adding a record
    function delete_review_view($record) {
        log_event('Review Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('review_delete.html', $record);
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_review_actions() {

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {
            if (add_review()) {
                header('Location: index.php');
            }
        }
        if ($action == 'update') {
            if (update_review()) {
                header('Location: index.php');
            }
        }
        if ($action == 'delete') {
            if (delete_review()) {
                header('Location: index.php');
            }
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $list = list_reviews();
            return review_list_view($list);
        }
        if ($action == 'add') {
            return add_review_view();
        }
        if ($action == 'remove') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return delete_review_view(get_review($id));
            }
        }
        if ($action == 'edit') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return edit_review_view(get_review($id));
            }
        }
    }


?>