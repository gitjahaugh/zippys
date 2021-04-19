<?php

    switch($action) {
        case "list_makes":
            include('view/make_list.php');
            break;
        case "add_make":
            MakesDB::add_make($make_name);
            header('Loaciton: .?action=list_makes');
            break;
        case "delete_make":
            if ($make_id) {
                try {
                    MakesDB::delete_make($make_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a make if there are vehicles associated to the make.";
                    include('../errors/error.php');
                    exit();
                }
            }
            header("Location: .?action=list_makes");
    }
?>