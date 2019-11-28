<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';
    require_once 'views.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_superhero() {
        global $db;

        // Pick out the inputs
        $name = filter_input(INPUT_POST, 'name');
        $aka = filter_input(INPUT_POST, 'aka');
        $image = filter_input(INPUT_POST, 'image');
        $description = filter_input(INPUT_POST, 'description');

        if (!empty($name) && !empty($aka) && !empty($image) && !empty($description)) {

            try {
                $query = "INSERT INTO superheroes (name, aka, image, description) VALUES (:name, :aka, :image, :description);";
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':aka', $aka);
                $statement->bindValue(':image', $image);
                $statement->bindValue(':description', $description);
                $statement->execute();
                $statement->closeCursor();
                
                log_event('Superhero CREATE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }

    // Lookup Record using ID
    function get_superhero($id) {
        global $db;
        
        try {
            $query = "SELECT * FROM superheroes WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();
            
            log_event('Superhero READ');
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
       
    }

    // Query for all superheros
    function list_superheroes () {
        global $db;
        
        try {
            $query = "SELECT * FROM superheroes";
            $statement = $db->prepare($query);
            $statement->execute();
            
            log_event('Superhero READ');
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }

    // Delete Database Record
    function delete_superhero() {
        global $db;
        $id = filter_input(INPUT_POST, 'id');
        if (!empty($id)) {
            try {
                $query = "DELETE from superheroes WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();
                
                log_event('Superhero DELETE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Update the database
    function update_superhero () {
        global $db;

        // Pick out the inputs
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $aka = filter_input(INPUT_POST, 'aka');
        $image = filter_input(INPUT_POST, 'image');
        $description = filter_input(INPUT_POST, 'description');

        if (!empty($id) && !empty($name) && !empty($aka) && !empty($image) && !empty($description)) {

            try {
                // Modify database row
                $query = "UPDATE superheroes SET name=:name, aka=:aka, image=:image, description=:description WHERE id = :id";
                $statement = $db->prepare($query);

                $statement->bindValue(':id', $id);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':aka', $aka);
                $statement->bindValue(':image', $image);
                $statement->bindValue(':description', $description);

                $statement->execute();
                $statement->closeCursor();

                log_event('Superhero UPDATE');                     // UPDATE
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
    function superhero_list_view($superheroes) {
        $html = '';
        foreach($superheroes as $row) {
            $html .= render_template('superhero.html', $row);
        }
        return $html;
    }


    // add_superhero_form -- Create an HTML form to add record.
    function add_superhero_view() {
        log_event('Superhero Add View');                   // Add View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page);        
        return render_template('superhero_add.html', array());
    }


    // Show form for adding a record
    function edit_superhero_view($record) {
        log_event('Superhero Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('superhero_edit.html', $record);
    }


    // Show form for adding a record
    function delete_superhero_view($record) {
        log_event('Superhero Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('superhero_delete.html', $record);
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_superhero_actions() {

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {
            if (add_superhero()) {
                header('Location: index.php');
            }
        }
        if ($action == 'update') {
            if (update_superhero()) {
                header('Location: index.php');
            }
        }
        if ($action == 'delete') {
            if (delete_superhero()) {
                header('Location: index.php');
            }
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $list = list_superheroes();
            return superhero_list_view($list);
        }
        if ($action == 'add') {
            return add_superhero_view();
        }
        if ($action == 'remove') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return delete_superhero_view(get_superhero($id));
            }
        }
        if ($action == 'edit') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return edit_superhero_view(get_superhero($id));
            }
        }
    }


?>