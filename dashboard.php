<?php
require( __DIR__ . "/includes/load.php" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/style.less">
    <link rel="stylesheet" href="/css/dashboard.less">

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
                    <a class="active item" href="/dashboard.php">
                        Places
                    </a>
                    <a class="item" href="/add.php">
                        Add Place
                    </a>
                </div>
                <div class="right">
                    <div class="logout item">
                        Logout
                    </div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UNIT/BUILDING NAME</th>
                        <th>LOCATION</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Swiss Suite</td>
                        <td>Bangsar, Kuala Lumpur</td>
                        <td style="text-align: right"></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Swiss Suite</td>
                        <td>Bangsar, Kuala Lumpur</td>
                        <td style="text-align: right"></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Swiss Suite</td>
                        <td>Bangsar, Kuala Lumpur</td>
                        <td style="text-align: right"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>