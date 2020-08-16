<?php
require( __DIR__ . "/includes/load.php" );
// requireAuth();

if (isset($_POST["place_name"])) {
    if (isset($_GET["id"])) {
        $db->updatePlace($_GET["id"], $_POST["place_name"], $_POST["location"]);
    } else {
        $db->addPlace($_POST["place_name"], $_POST["location"]);
    }
}

// For update, we get the data from the database based on
// the ID provided from the URL query. Example: /add.php?id=1
if (isset($_GET["id"])) {
    $place = $db->getPlace($_GET["id"]);

    $id = isset($place["id"]) ? $place["id"] : "";
    $place_name = isset($place["name"]) ? $place["name"] : "";
    $place_location = isset($place["location"]) ? $place["location"] : "";
} else {
    $id = "";
    $place_name = "";
    $place_location = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/style.less">
    <link rel="stylesheet" href="/css/add.less">

    <title>Dashboard</title>
</head>

<body class="dashboard">
    <div class="global">
        <div class="logo">
            <img src="/images/logo.svg" alt="logo">
        </div>

        <div class="card">
            <div class="nav">
                <div class="left">
                    <a class="item" href="/dashboard.php">
                        Places
                    </a>
                    <a class="active item" href="/add.php">
                        Add Place
                    </a>
                </div>
                <div class="right">
                    <div class="logout item">
                        Logout
                    </div>
                </div>
            </div>

            <div class="content">
                <form method="post">
                    <div class="field">
                        <label for="place_name">Place Name</label>
                        <input type="text" name="place_name" id="place_name" value="<?= $place_name; ?>">
                    </div>

                    <div class="field">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" value="<?= $place_location; ?>">
                    </div>

                    <div class="field" style="text-align:right">
                        <button class="button" style="display: inline-block; width:auto">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>