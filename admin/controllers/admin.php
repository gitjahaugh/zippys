<?php 

    switch ($action) {
        case "login":
            if (AdminDB::is_valid_admin_login($username, $password)) {
                $_SESSION['is_valid_admin'] = true;
                header('Location: .?action=list_vehicles');
            } else {
                $login_message = "Incorrect login / Lobin Required.";
                $login_message_style = 'color: red;';
                include('./view/login.php');
            }
            break;
        case "show_login":
            include('view/login.php');
            break;
        case "register":
            // Include utility functions for registration
            include('./util/valid_register.php');
            $errors = AdminDB::valid_registration($username, $password, $confirm_password);
            // errors exist or success
            if ($errors) {
                include('view/register.php');
            } else {
                // Store new user id and password
                AdminDB::add_admin($username, $password);
                // Allow user to view admin area
                $_SESSION['AdminDB::is_valid_admin'] = true;
                header("Location: .?aciton=list_vehicles");
            }
            break;
        case "show_register":
            include('./view/register.php');
            break;
        case "logout":
            $_SESSION = array();
            session_destroy();
            $login_message = "You have been logged out.";
            include('./view/login.php');
            break;
    }
?>