<?php
    function get_all_vehicles($sort) {
        global $db;
        if ($sort == 'year') {
            $order_by = 'V.year';
        } elseif ($sort == 'price') {
            $order_by = 'V.price';
        } else {
            $order_by = 'V.vehicle_id';
        }
        $query = 'SELECT V.vehicle_id, V.year, V.price, V.model, M.Make, T.Type, C.Class
                    FROM vehicles V
                    LEFT JOIN makes M ON V.make_id = M.ID
                    LEFT JOIN types T ON V.type_id = T.ID
                    LEFT JOIN classes C ON V.class_id = C.ID
                    ORDER BY ' . $order_by . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_make($make_id, $sort) {
        global $db;
        if ($sort == 'year') {
            $order_by = 'V.year';
        } else {
            $order_by = 'V.price';
        }
        $query = 'SELECT V.vehicle_id, V.year, V.price, V.model, M.Make, T.Type, C.Class
                    FROM vehicles V
                    LEFT JOIN makes M ON V.make_id = M.ID
                    LEFT JOIN types T ON V.type_id = T.ID
                    LEFT JOIN classes C ON V.class_id = C.ID
                    WHERE V.make_id = :make_id
                    ORDER BY ' . $order_by . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type_id, $sort) {
        global $db;
        if ($sort == 'year') {
            $order_by = 'V.year';
        } else {
            $order_by = 'V.price';
        }
        $query = 'SELECT V.vehicle_id, V.year, V.price, V.model, M.Make, T.Type, C.Class
                    FROM vehicles V
                    LEFT JOIN makes M ON V.make_id = M.ID
                    LEFT JOIN types T ON V.type_id = T.ID
                    LEFT JOIN classes C ON V.class_id = C.ID
                    WHERE V.type_id = :type_id
                    ORDER BY ' . $order_by . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_class($class_id, $sort) {
        global $db;
        if ($sort == 'year') {
            $order_by = 'V.year';
        } else {
            $order_by = 'V.price';
        }
        $query = 'SELECT V.vehicle_id, V.year, V.price, V.model, M.Make, T.Type, C.Class
                    FROM vehicles V
                    LEFT JOIN makes M ON V.make_id = M.ID
                    LEFT JOIN types T ON V.type_id = T.ID
                    LEFT JOIN classes C ON V.class_id = C.ID
                    WHERE V.class_id = :class_id
                    ORDER BY ' . $order_by . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function delete_vehicle($vehicle_id) {
        global $db;
        $query =    'DELETE FROM vehicles
                    WHERE vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();

    }
    function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
        global $db;
        $query =    'INSERT INTO vehicles 
                        (year, model, price, make_id, type_id, class_id)
                    VALUES 
                        (:year, :model, :price, :make_id, :type_id, :class_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();

    }
    // function update_vehicle ($year, $model, $price, $make_id, $type_id, $class_id) {
    //     global $db;
    //     $query = 'UPDATE vehicles
    //                 SET year = $year, model = $model, price = $price, make_id = $make_id, type_id = $type_id, class_id = $class_id
    //                 WHERE vehicle_id = :vehicle_id';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(':vehicle_id', $vehicle_id);
    //     $statemnet->execute();
    //     $statement->closeCursor();
    // }
    // function get_makeTypeClass_filter ($make_id, $type_id, $class_id, $sort) {
    //     global $db; 
    //     if ($sort == 'price') {
            
    //     }
    // }
    // function get_makeClass_filter ($make_id, $class_id, $sort) {

    // }
    // function get_tpeClass_filter ($type_id, $class_id, $sort) {

    // }
?>