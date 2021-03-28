<?php 
    require('../model/database.php');
    require('../model/vehicles_db.php');
    require('../model/makes_db.php');
    require('../model/types_db.php');
    require('../model/classes_db.php');

    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if (!$make_id) {
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    }
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    if (!$type_id) {
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    }
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if (!$class_id) {
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    }
    
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
    $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
    $class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);


    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_vehicles';
        }
    }

    if ($action === 'list_makes' ||
        $action === 'add_make' ||
        $action === 'delete_make')
        include('controllers/makes.php');

    if ($action === 'list_types' ||
        $action === 'add_type' ||
        $action === 'delete_type')
        include('controllers/types.php');

    if ($action === 'list_classes' ||
        $action === 'add_class' ||
        $action === 'delete_class')
        include('controllers/classes.php');

    if ($action === 'show_add_vehicle_form' ||
        $action === 'add_vehicle' ||
        $action === 'delete_vehicle' ||
        $action === 'list_vehicles')
        include('controllers/vehicles.php');
?>