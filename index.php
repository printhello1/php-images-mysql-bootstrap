<?php

require "custom.php";

$message = "";

session_start();

if(isset($_SESSION['message'])) {

    $message = $_SESSION['message'];

    unset($_SESSION['message']);

}

require "database.php";

$images = getAll();

$data = array();

if(count($images) > 0) {

    foreach($images as $image) {

        $format = "data:image;base64,{$image['image']}";

        array_push($data, $format);

    }

}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Tutorial</title>
  </head>
  <body>


    <div class="container">
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>

        <?php if(!empty($message)) { echo $message; } ?>


        <form action="save.php" method="post" enctype="multipart/form-data">
        
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>    
            </div>
        
            <div class="form-group">
            
                <button type="submit" class="btn btn-success"> Save </button>

            </div>
        
        </form>

        <hr />

        <?php foreach($data as $image): ?>

            <img src="<?= $image ?>" style="width:300px; height:200px;" />

        <?php endforeach; ?>

    </div>

    <script>
    
        var inputFile = document.querySelector("#image");

        inputFile.onchange = function () {

            var nameFile = document.querySelector(".custom-file-label");

            nameFile.innerHTML = inputFile.value;

        }
    
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>