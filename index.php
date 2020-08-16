<?php
require( __DIR__ . "/includes/load.php" );
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hello world</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/style.less">
        <link rel="stylesheet" href="/css/login.less">
    </head>

    <body class="login">
        <div class="global">
            <div class="card">
                <div class="content">
                    <div class="logo">
                        <img src="/images/logo.svg" alt="Logo">
                    </div>
                    <form class="form">
                        <div class="field">
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="field">
                            <input type="password" name="password" id="password" placeholder="••••••">
                        </div>
                        <div class="field">
                            <button class="button">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="//cdn.jsdelivr.net/npm/less" ></script>
    </body>
</html>