<?php
require(__DIR__ . "/database.php");
require(__DIR__ . "/functions.php");

$db = new Database("localhost", "root", "almukhtar7890", "pobox");

function db() {
    global $db;
    return $db;
}