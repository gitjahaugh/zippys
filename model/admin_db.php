<?php 

class AdminDB {

        public static function add_admin($username, $password) {
        $db = Databse::getDB();
        $hash = password_hash ($password, PASSWORD_DEFAULT);
        $query =    'INSERT INTO administratiors 
                        (username, password)
                    VALUES 
                        (:user, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $username);
        $statement->bindValue(':password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }

        public static function is_valid_admin_login ($username, $password) {
        $db = Database::getDB();
        $query =    'SELECT password 
                    FROM administrators
                    WHERE username = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = (!empty($row['password'])) ? $row['password'] : NULL; 
        return password_verify($password, $hash);
    }

        public static function username_exist ($username) {
        $db = Database::getDB();
        $query =    'SELECT count(*)
                    FROM administors
                    WHERE username = :user';
        $statement = $db->prepare($query);
        $statement->bindParam(':user', $username);
        $statement->execute();
        $result = $statement->fetchColumn();
        return $result;
    }
}
?>