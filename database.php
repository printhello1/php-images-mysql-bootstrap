<?php

function connect() {

    return new PDO("mysql:host=localhost;dbname=tutorials;charset=utf8", "admin", "@admin");

}

function create($name, $image) {

    $pdo =  connect();

    $sql = "insert into images (name, image) values (?, ?)";

    $insert = $pdo->prepare($sql);

    $insert->bindValue(1, $name);
    $insert->bindValue(2, $image);

    return $insert->execute();

}

function getAll() {

    $pdo = connect();

    $rs = $pdo->query("select * from images");

    return $rs->fetchAll();

}