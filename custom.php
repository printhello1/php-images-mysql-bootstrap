<?php

function dd($dump) {

    var_dump($dump);
    die();

}

function flash($message, $alert = 'info') {

    return "<p class='alert alert-{$alert}'> {$message} </p>";

}