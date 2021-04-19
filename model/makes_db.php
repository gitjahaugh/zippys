<?php

class MakesDB {

    // Get all the makes by ID
    public static function get_makes() {
        $db = Database::getDB();
        $query =    'SELECT * 
                    FROM makes
                    ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    // Funciton to get make names from database using their ID's
    public static function get_make_name($make_id) {
        $db = Database::getDB();
        $query =    'SELECT *
                    FROM makes
                    WHERE ID = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        $make_name = $make['Make'];
        return $make;
    }

    // Function to delete a Make from the database
    public static function delete_make($make_id) {
        $db = Database::getDB();
        $query =    'DELETE FROM makes
                    WHERE ID = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    // Funciton to add a make to the database
    public static function add_make($make_name) {
        $db = Database::getDB();
        $query =    'INSERT INTO makes
                        (Make)
                    VALUES
                        (:make_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>