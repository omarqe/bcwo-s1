<?php
// error_reporting(0);

class Database {
    private $mysqli = null;

    public function __construct($dbhost, $dbuser, $dbpass, $dbname) {
        $this->mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ( $this->mysqli->connect_errno ) {
            exit(
                "<h1>Error connecting to the database</h1>" .
                "<h3>[$this->mysqli->connect_errno]: $this->mysqli->connect_error;</h3>"
            );
        }
    }

    public function mysqli() {
        return $this->mysqli;
    }

    public function createTables() {
        $statements = [
            "CREATE TABLE user ("
            . "id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
            . "username VARCHAR(30) NOT NULL,"
            . "password VARCHAR(100) NOT NULL"
            . ")",
    
            // CREATE TABLE places (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, ...)
            "CREATE TABLE places ("
            . "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
            . "place_name VARCHAR(30) NOT NULL,"
            . "place_location VARCHAR(50) NOT NULL,"
            . "have_mail TINYINT(1) NOT NULL"
            . ")"
        ];
        
        foreach ( $statements as $statement ) {
            if ( !$this->mysqli->query($statement) ) {
                exit( $this->mysqli->error );
            }
        }

        return true;
    }

    public function getPlaces() {
    }

    public function getPlace($id) {
        // $result = $this->mysqli->prepare("SELECT * FROM places WHERE id = ?");
        // $result->bind_param("s", $id);
        // $result->execute();

        // Unsecured statement!! Prone to SQL injection!
        $result = $this->mysqli->query("SELECT * FROM places WHERE id = '$id'");
        
        // Place not found!
        if ($result->num_rows < 1) {
            return [];
        }

        $data = $result->fetch_assoc();
        return [
            "id" => $data["id"],
            "name" => $data["place_name"],
            "location" => $data["place_location"],
        ];
    }

    public function addPlace($name, $location) {
        if (empty($name) || empty($location)) {
            exit( "Name or location is empty" );
        }

        $have_mail = 0;
        $stmt = $this->mysqli->prepare("INSERT INTO places (place_name, place_location, have_mail) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $location, $have_mail);
        
        if ($stmt->execute()) {
            header("Location: /dashboard.php?success=true");
            exit;
        }

        exit($this->mysqli->error);
    }

    public function updatePlace($id, $name, $location) {
        if (empty($id) || empty($name) || empty($location)) {
            exit( "ID, name or location is empty" );
        }

        $have_mail = 0;
        $stmt = $this->mysqli->prepare("UPDATE places SET place_name = ?, place_location = ?, have_mail = ? WHERE id = ?");
        $stmt->bind_param("ssdd", $name, $location, $have_mail, $id);

        if ($stmt->execute()) {
            header("Location: /dashboard.php?updated=true");
            exit;
        }

        exit($this->mysqli->error);
    }
}