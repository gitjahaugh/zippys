<?php 
    // Create a class to access the database once pre browser
    class Database {
        // Values to access the database
        private static $dsn = 'mysql:Host=localhost;dbname=zippyusedautos';
        private static $username = 'root';
        private static $password = 'sesame';
        // Store the reference to the database once there is a connection
        private static $db;

        // Technique used for classes that only provide static properties and methods
        private function __construct () {}

        // Return refernce to the PDO object
        public static function getDB () {
            // Check to see if there is already a connection
            if (!isset(self::$db)) {
                // Attempt a connection to the database
                try { 
                    self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
              // Give error message if unable to connect to database
            } catch (PDOException $e) {
                $e = "Database Error";
                $e .= $error->getMessage();
                include('..errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
