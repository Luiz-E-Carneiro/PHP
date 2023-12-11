<?php
// Inicia ou resgata a sessão
session_start();

$points = $_GET['pts'];
$current_user = $_SESSION['current_user'];

$_SESSION['array_users'][$current_user] = $_GET['pts'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punctuation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="title">Final Rank:</h2>
            
            <?php

            if (isset($_SESSION['array_users'])) {

                $sorted = $_SESSION['array_users'];
                arsort($sorted);

                echo "<ul class='user_scores'>";
                $i = 1;
                foreach ($sorted as $user => $pts) {
                    echo "<li>$i". "°"." - $user " . (intval($pts) * 100) / 50 . " %</li>";
                    $i += 1;
                }
                echo '</ul>';

            } else {
                echo "No data";
            }
            ?>
            <a href="login.php"><button class='common_button'>Leave</button></a>
        </div>
    </div>
</body>
</html>
