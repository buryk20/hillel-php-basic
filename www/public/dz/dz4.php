<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .wrp-color-block {
            width: 150px;
            height: 50px;

            display: flex;

            border: 1px solid black;
        }
    </style>
</head>
<body>
<main>
    <?php
    $color = 5;

    function determineColor($color)
    {
        return $color = match($color) {
            1 => 'green',
            2 => 'red',
            3 => 'blue',
            4 => 'brown',
            5 => 'violet',
            6 => 'black',
            default => 'white'
        };
    }
    ?>

    <h1>Color: "<?=determineColor($color)?>" </h1>
    <div class="wrp-color-block" style="background-color: <?=determineColor($color)?>">

    </div>
</main>
</body>
</html>


