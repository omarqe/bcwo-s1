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

    public function addPlace($firstname, $lastname) {
    }

    public function deletePlace() {
    }
}