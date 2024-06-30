<?php

require_once('Request.php');

$arrID = explode(",", $_GET['ids']);

foreach ($arrID as $id) {
    $request = new Request("http://servicos.cptec.inpe.br/XML/cidade/7dias/$id/previsao.xml", "XML");
    $data = $request->execute();
    if (!$request->isSuccess()) {
        echo "<p>Erro na hora de pegar os dados! da cidade com id $id</p>";
    } else {
        $data_array = json_decode(json_encode($data), true);
        $data_array['id'] = $id;
        $all_cities_data[] = $data_array;
    }
}
file_put_contents('cities_infos.json', json_encode($all_cities_data, JSON_PRETTY_PRINT));

header("location: index.php?previsao=true");