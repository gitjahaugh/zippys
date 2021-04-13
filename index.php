<?php 

    // Start session with presisent cookie
    $lifetime = 60 * 60 * 24 * 14; //session last for 2 weeks in seconds
    session_set_cookie_params($lifetime, '/');
    session_start();

    // Pass the models to the page
    require('model/database.php');
    require('model/vehicles_db.php');
    require('model/makes_db.php');
    require('model/types_db.php');
    require('model/classes_db.php');

    // Get parameter data sent to the controller
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_STRING);

    // Get required data from model
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    // Get the action to perform
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); 
    
    // Perform the action and get the data for the view
    switch ($action) {
        case "register":
            if(isset($first_name)) {
                $_SESSION['userid'] = $first_name;
            }
            include('view/register.php');
            break;
        case "logout":
            $first_name = $_SESSION['userid'];
            unset($_SESSION['userid']);
            $_SESSION = array();
            session_destroy();
            $name = session_name();
            $expire = strtotime ('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            include('view/logout.php');
            break;
        default: 
            if ($make_id) {
                $make_name = get_make_name($make_id);
                $vehicles = get_vehicles_by_make($make_id, $sort);
            } elseif ($type_id) {
                $type_name = get_type_name($type_id);
                $vehicles = get_vehicles_by_type($type_id, $sort);
            } elseif ($class_id) {
                $class_name = get_class_name($class_id);
                $vehicles = get_vehicles_by_class($class_id, $sort);
            } else {
                $vehicles = get_all_vehicles($sort);
            }
            include('view/vehicle_list.php');
    }



?>
