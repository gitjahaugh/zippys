<?php 

    switch($action) {
        case 'show_add_vehicle_form':
            include('view/add_vehicle_form.php');
            break;
        case 'add_vehicle':
            if($year && $model && $price && $make_id && $type_id && $class_id) {
                VehiclesDB::add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
            } else {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('../errors/error.php');
                exit();
            }
            header('Location: .?action=list_vehicles');
            break;
        case 'delete_vehicle':
            if ($vehicle_id) {
                try {
                    VehiclesDB::delete_vehicle($vehicle_id);
                } catch (PDOException $e) {
                    $error = "Missing or incorrect vehicle id.";
                    include('../errors/error.php');
                    exit();
                }
            }
            header('Location: .?action=list_vehicles');
            break;
        case 'list_vehicles':
            if ($make_id) {
                $make_name = MakesDB::get_make_name($make_id);
                $vehicles = VehiclesDB::get_vehicles_by_make($make_id, $sort);
            } elseif ($type_id) {
                $type_name = TypesDB::get_type_name($type_id);
                $vehicles = VehiclesDB::get_vehicles_by_type($type_id, $sort);
            } elseif ($class_id) {
                $class_name = ClassesDB::get_class_name($class_id);
                $vehicles = VehiclesDB::get_vehicles_by_class($class_id, $sort);
            } else {
                $vehicles = VehiclesDB::get_all_vehicles($sort);
            }
            include('view/admin_vehicle_list.php');
    }

?>