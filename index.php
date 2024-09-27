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
    <a href="#" id="openModalButton" class="text-center options">Manage Teams</a>
    <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Basketball Teams</h2>
        <table>
            <tr>
                <th>Team</th>
                <th>Color <br>  (Hex Value Only)</th>
                <th>Option</th>
            </tr>
            <?php
            // Loop through the prizes and generate table rows
            foreach ($prizes as $prize) {
                echo '<tr  style="background-color:' . htmlspecialchars($prize['color']) . ';">';
                    echo '<td>' . htmlspecialchars($prize['text']) . '</td>';
                    echo '<td>' . htmlspecialchars($prize['color']) . '</td>';
                    echo '<td>
                          </td>';
                echo '</tr>';
            }
            ?>
            
        </table>
    </div>
    </div>
    <script>
        var options = <?= $jsonPrizes; ?>;

        // MODAL
        var modal = document.getElementById("modal");
        var btn = document.getElementById("openModalButton");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
        modal.style.display = "block";
        }

        span.onclick   
        = function() {
        modal.style.display = "none";
        }

        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";   

        }
        }
    </script>
    <script src="spin-wheel.js"></script>
</body>
</html>