<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reaper.css">
</head>

<body>
    
    <div class="deal-wheel">
        <ul class="spinner"></ul>
        <figure class="cap">
            <?php include('reaper.html');?>
        </figure>
        <div class="ticker"></div>
        <input type="text" id="key" oninput="myFunction()" autofocus>
        <button class="btn-spin" >Spin the wheel</button>
       
    </div>
    <script>
        var options = <?= $jsonPrizes; ?>;
        // alert(options);
    </script>
    <script src="spin-wheel.js"></script>
</body>
</html>