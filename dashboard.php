<?php
require( __DIR__ . "/includes/load.php" );
// requireAuth();

$places = [];
$stmt = $db->mysqli()->query("SELECT * FROM places ORDER BY place_name");
if ($stmt->num_rows > 0) {
    while ($data = $stmt->fetch_assoc()) {
        $id = $data["id"];
        $name = $data["place_name"];
        $location = $data["place_location"];

        $places[$id] = compact("id", "name", "location");
    }
}
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

            <?php if (isset($_GET["success"]) && $_GET["success"] == true): ?>
                <div style="padding: 8px 25px; background-color:#158467; color:white">
                    New place has been added!
                </div>
            <?php elseif (isset($_GET["updated"]) && $_GET["updated"] == true): ?>
                <div style="padding: 8px 25px; background-color:#158467; color:white">
                    The place has been updated!
                </div>
            <?php endif; ?>

            <?php if (empty($places)): ?>
                <div class="content" style="display:flex; height:300px; align-items:center; justify-content:center">
                    No places added yet.
                </div>
            <?php else: ?>
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
                        <?php foreach($places as $id => $place): ?>
                            <tr>
                                <td><?= $id; ?></td>
                                <td><?= $place["name"] ?></td>
                                <td><?= $place["location"] ?></td>
                                <td style="text-align: right">
                                    <a href="<?= "/add.php?id=$id" ?>">Edit</a>
                                    <a href="<?= "/delete.php?id=$id" ?>" style="color:red; display:inline-block; margin-left: 5px">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>