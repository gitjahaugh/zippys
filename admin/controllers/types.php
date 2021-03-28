<?php

    switch($action) {
        case "list_types":
            include('view/type_list.php');
            break;
        case "add_type":
            add_type($type_name);
            header('Loaciton: .?action=list_types');
            break;
        case "delete_type":
            if ($type_id) {
                try {
                    delete_type($type_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a type if there are vehicles associated to the type.";
                    include('../errors/error.php');
                    exit();
                }
            }
            header("Location: .?action=list_types");
    }
?>