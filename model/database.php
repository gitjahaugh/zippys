<?php 

    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = 'sesame';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $e = 'Database error';
        $e .=$error->getMessage();
        include('..errors/database_error.php');
        exit();
    }
?>