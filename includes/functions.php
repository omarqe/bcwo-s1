<?php
function login($username, $password) {
    global $db;

    // Username or password is empty
    if (empty($username) || empty($password)) {
        exit( "Username/password is empty" );
    }

    $password = hash("md5", $password);
    $mysqli = $db->mysqli();
    $result = $mysqli->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    if ( $result->num_rows > 0 ) {
        $result->free_result();

        // You have to do the authentication over here.
        // setcookie("cookie_name", "value", ...)

        return true;
    }
    
    return false;
}

function requireAuth() {
    if (!isset($_COOKIE["cookie_name"])) {
        header( "Location: /" );
        exit;
    }
}

function getQR($id) {
    return "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost/doi.php?id=$id";
}