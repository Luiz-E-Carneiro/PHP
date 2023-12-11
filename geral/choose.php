<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Choose a Theme</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="box_title">Choose a Theme:</h2>
            <div class="theme_container">
                <?php
                
                ob_start();
                require './../questions_php/data_questions.php';
                ob_end_clean();
                
                foreach ($all_questions as $theme => $questions): ?>
                        <a href="question.html?theme=<?= $theme ?>"><button class="common_button" id="<?= $theme ?>" type="submit"><?= ucfirst($theme) ?></button></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>