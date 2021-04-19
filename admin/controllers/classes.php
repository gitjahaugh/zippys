<?php

    switch($action) {
        case "list_classes":
            include('view/class_list.php');
            break;
        case "add_type":
            ClassesDB::add_class($class_name);
            header('Loaciton: .?action=list_classes');
            break;
        case "delete_class":
            if ($class_id) {
                try {
                    ClassesDB::delete_class($class_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a class if there are vehicles associated to the class.";
                    include('../errors/error.php');
                    exit();
                }
            }
            header("Location: .?action=list_classes");
    }
?>