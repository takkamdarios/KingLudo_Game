<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux de ludo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: ghostwhite">

<div style="width: 90%; margin: auto" >
    <!-- start game   -->
    <div class="row" style="margin-top: 3%">
        <!-- start score   -->
        <div class="col-2 text-center"> 
            <div>
                <img src="player_1.png" style="width: 40%;" alt="">
                <p>Position : <span class="text-primary bold" id="position1">0</span></p>
            </div> 
            <hr >
            <div>
                <img src="player_2.png" style="width: 40%" alt="">
                <p>Position : <span class="text-danger bold" id="position2">0</span></p>
            </div>
        </div><!-- end score   -->
        <!-- start ludo table   -->
        <table class="col-8 mr-5" id="table" style="border-radius: 10px/10px; border: lightgoldenrodyellow solid .5em; box-shadow: 10px 10px cornsilk"></table> <!-- end ludo table   -->
        <div style="margin-top: 10%" class="col text-center">
            <div>
                <button class=" btn-lg btn-primary" id="btnPlay1">JOUER</button>
                <br>
                <p id="randomValue1" class="bold mt-2" style="font-size: 20px">0</p>
            </div>
            <div style="margin-top: 50%">
                <button class=" btn-lg btn-danger" id="btnPlay2">JOUER</button>
                <br>
                <p id="randomValue2" class="bold mt-2" style="font-size: 20px">0</p>
            </div>
        </div>
    </div> <!-- end game   -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="ludo.js"></script>
</body>
</html>

