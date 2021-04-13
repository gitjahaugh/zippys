<?php 
    function add_admin($username, $password) {
        global $db;
        $hash = password_hash ($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO administratiors 
                        (username, password)
                    VALUES 
                        (:user, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $username);
        $statement->bindValue(':password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }

    function is_valid_admin_login ($username, $password) {
        global $db;
        $query = 'SELECT password 
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

    function username_exists ($username) {
        global $db;
        $query = 'SELECT count(*)
                    FROM administors
                    WHERE username = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $username);
        $statement->execute();
        $result = $statement->fetchColumn();
        $statement->closeCursor();
        return $result;
    }
?>