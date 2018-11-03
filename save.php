<?php

require "custom.php";

$message = flash("Choose image", "warning");

if(getimagesize($_FILES['image']['tmp_name'])) {

    $image = $_FILES['image']['tmp_name'];
    $image = file_get_contents($image);
    $image = base64_encode($image);
    $name = $_FILES['image']['name'];

    require "database.php";

    if(create($name, $image)) {

        $message = flash("Saved successfully!", "success");

    } else {

        $message = flash("Failed save.", "danger");

    }

}

session_start();

$_SESSION['message'] = $message;

header("location: /");