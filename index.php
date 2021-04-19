<?php 

    // Start session with presisent cookie
    $lifetime = 60 * 60 * 24 * 17; //session last for 1 weeks in seconds
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
    $makes = MakesDB::get_makes();
    $types = TypesDB::get_types();
    $classes = ClassesDB::get_classes();

    // Get the action to perform
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); 
    
    // Get vehicles
    $vehicles = VehiclesDB::get_all_vehicles($sort);
    // Filter vehicles 
    if ($make_id) {
        $make_name = MakesDB::get_make_name($make_id);
        $vehicles = array_filter($vehicles, function($array) use ($make_name) {
            return $array["Make"] === $make_name;
        });
    }
    if ($type_id) {
        $type_name = TypesDB::get_type_name($type_id);
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["Type"] === $type_name;
        });
    }
    if ($class_id) {
        $class_name = ClassesDB::get_class_name($class_id);
        $vehicles = array_filter($vehicles, function($array) use ($class_name) {
            return $array["Class"] === $class_name;
        });
    }
    if ($first_name) {
        $_SESSION['userid'] = $first_name;
    }

    switch($action) {
        case 'register': 
            include('view/register.php');
            break;
        case 'logout':
            include('view/logout.php');
            break;
        default:
            include('view/vehicle_list.php');
    }

?>
