<?php
class db {
    private static $host = "";
    private static $user = "";
    private static $password = "";
    private static $db = "";
    private static $conn;

    public static function init($host, $user, $password, $db) {
        self::$host = $host;
        self::$user = $user;
        self::$password = $password;
        self::$db = $db;

        try {
            self::$conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Error connecting to database: " . $e->getMessage());
        }
    }

    public static function getRecords($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertRecords($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function deleteRecords($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function updateRecords($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function getRecord($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function insertRecord($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return self::$conn->lastInsertId();
    }
    
    public static function deleteRecord($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    
    public static function updateRecord($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    
}

// Connect to database automatically when the file is included
db::init("DESKTOP-OFGEF8P", "", "", "ProjectA");
?>