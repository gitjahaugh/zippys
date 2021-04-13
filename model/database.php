<?php 

    //$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    //$username = 'root';
    //$password = 'sesame';

    $dsn = 'mysql://i7w8gblnaqcptqip:mv9gufsfyku3gcep@g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ef1ia7lpwe16ynsg;dbname=ef1ia7lpwe16ynsg';
    $username = 'i7w8gblnaqcptqip';
    $password = 'mv9gufsfyku3gcep';

    // $dsn = 'mysql://i7w8gblnaqcptqip:mv9gufsfyku3gcep@g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ef1ia7lpwe16ynsg:host=g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=ef1ia7lpwe16ynsg';
    // $username = 'i7w8gblnaqcptqip';
    // $password = 'mv9gufsfyku3gcep';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $e = 'Database error';
        $e .= $error->getMessage();
        include('..errors/database_error.php');
        exit();
    }
?>
