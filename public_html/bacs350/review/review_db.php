<?php

    /* -------------------------------
        CRUD OPERATIONS
    ------------------------------- */

    // Add a new record
    function add_review($db, $designer, $url, $report, $score, $date) {
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
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


     // Lookup Record using ID
    function get_review($db, $id) {
        try {
            $query = "SELECT * FROM reviews WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
       
    }
       

    // Query for all reviews
    function list_reviews ($db) {
       try {
            $query = "SELECT * FROM reviews";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Delete Database Record
    function delete_review($db, $id) {
        try {
            $query = "DELETE from reviews WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Update the database
    function update_review($db, $designer, $url, $report, $score, $date, $id) {
        try {
            // Modify database row
            $query = "UPDATE reviews SET designer=:designer, url=:url, report=:report, score=:score, date=:date WHERE id = :id;";
            $statement = $db->prepare($query);
            $statement->bindValue(':designer', $designer);
            $statement->bindValue(':url', $url);
            $statement->bindValue(':report', $report);
            $statement->bindValue(':score', $score);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
            return true;
            } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }
    
    ////////////////////// LOG METHODS ///////////////////////
    // Add a new record
    function add_log($log, $text) {

        // Show if insert is successful or not
        try {
            // Create a string for "now"
            date_default_timezone_set("America/Denver");
            $date = date('Y-m-d g:i:s a');
            
            // Add database row
            $query = "INSERT INTO log (date, text) VALUES (:date, :text);";
            $statement = $log->prepare($query);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':text', $text);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete all database rows
    function clear_log($log) {
        
        try {
            $query = "DELETE FROM log";
            $statement = $log->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all log
    function query_log ($log) {

        $query = "SELECT * FROM log";
        $statement = $log->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }


    /* ----------------------------------------------
        Views
    ---------------------------------------------- */


    // render_list -- Loop over all of the log to make a bullet list
    function render_log($log) {
        $list = query_log ($log);
        $text = '<h3>Application History</h3><ul>';
        foreach ($list as $s) {
            $text .= '<li>' . $s['date'] . ', ' . $s['text'] . '</li>';
        }
        $text .= '</ul>';
        return $text;     
    }


    /* -------------------------------
        DATABASE CONNECT
    ------------------------------- */

    // Connect to Bluehost database 
    function review_database($host, $dbname, $username, $password) {
        try {
            $db_connect = "mysql:host=$host;dbname=$dbname";
            return new PDO($db_connect, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Connect to the Bluehost database
    function bluehost_connect() {
        $dbname = 'atthewb6_notes';
        $username = 'atthewb6_test';
        $password = 'BACS_350';
        $port = '3306';
        $host = "localhost:$port";
        return review_database($host, $dbname, $username, $password);
    }


    // Create a database connection
    $db = bluehost_connect(); 

?>
