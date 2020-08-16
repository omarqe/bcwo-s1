<?php
require( __DIR__ . "/includes/load.php" );
// requireAuth();
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
                        <label for="building">Building Name</label>
                        <input type="text" name="building_name" id="building">
                    </div>

                    <div class="field">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location">
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