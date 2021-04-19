<?php 
class TypesDB {

    // Get all types from database by ID
    public static function get_types() {
        $db = Database::getDB(); 
        $query =    'SELECT *
                    FROM types
                    ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    // Get the names of the types by their ID's
    public static function get_type_name($type_id) {
        $db = Database::getDB();
        $query =    'SELECT * 
                    FROM types
                    WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['Type'];
        return $type;
    }

    // Funciton to delete a type from the database
    public static function delete_type($type_id) {
        $db = Database::getDB(); 
        $query =    'DELETE FROM types
                    WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    // Function to add a type to the database
    public static function add_type($type_name) {
        $db = Database::getDB();
        $query =    'INSERT INTO types
                        (Type)
                    VALUES
                        (:type_name)';
        $statement = $b->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->excute();
        $statement->closeCursor();
    }
}
?>