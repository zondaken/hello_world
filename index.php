<?php
require_once "php/config/config.inc.php";

if (!isset($dbHandler)) die;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>hello_world</title>

    <link rel="stylesheet" href="css/mainstyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
</head>
<body class="p-3 m-0">

<div class="container text-center">
    <div class="row align-items-center">
        <div class="col-4 offset-4 alert alert-secondary">
            <h1>hello_world</h1>
            <div class="row m-2">
                <button class="btn btn-primary">Button</button><br>
            </div>
            <div class="row m-2">
                <button class="btn btn-primary">Button</button><br>
            </div>
            <div class="row m-2">
                <button class="btn btn-primary">Button</button><br>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>