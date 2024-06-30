<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Previsão do Tempo</title>
</head>
<body>
    <div class="search-area">
        <form action="pesquisar_info.php" method="get">
            <span>Nome do Município: </span>
            <input type="text" name="cityName" placeholder="Nome aqui...">
        </form>
        <form action="pre"></form>
    </div>
    <div class="info-area">
        <?php
            if(isset($_GET['previsao'])){
                $json_data = file_get_contents('cities_infos.json');
                $info_cidades = json_decode($json_data, true);
                foreach ($info_cidades as $info) {
                    $city_id = $info['id'];
                    $city_name = urldecode($info['nome']);
                    $city_uf = $info['uf'];
                    $atualizacao = $info['atualizacao'];
                    $previsoes = $info['previsao'];
                    
                    echo "<div class='card'>";
                    
                    echo "<p>Nome da Cidade: " . $city_name . "</p>";
                    echo "<p>UF: " . $city_uf . "</p>";
                    echo "<p>Previsões:</p>";
                    
                    foreach ($previsoes as $previsao) {
                        echo "<div class='previsao'>";
                        echo "<p>Dia: " . $previsao['dia'] . "</p>";
                        echo "<p>Tempo: " . $previsao['tempo'] . "</p>";
                        echo "<p>Máxima: " . $previsao['maxima'] . "</p>";
                        echo "<p>Mínima: " . $previsao['minima'] . "</p>";
                        echo "</div>";
                    }
                    
                    echo "</div>";
                }
            } 
        ?>
    </div>
</body>
</html>