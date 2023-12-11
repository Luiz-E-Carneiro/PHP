<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="./../saves_php/save_name.php" method="post" class="login">
            <h2 class="box_title">Type Your Name:</h2>
            <input name="name" type="text" class="name_input" id="name_input">

            <?php
            
            if(isset($_GET['error'])){
                if($_GET['error'] == 1) echo '<p>Type a Name</p>';
                if($_GET['error'] == 2) echo '<p>Name already used</p>';
            }
            
            ?>
            
            <button type="submit" class="submit_btn" id="submit_btn">Submit</button>
            
            <?php
            
            session_start();

            if (isset($_SESSION['current_user'])) unset($_SESSION['current_user']);

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
                echo "<p class='notice'>No players yet</p>";
            }

            
            ?>
        </form>
    </div>
</body>

</html>