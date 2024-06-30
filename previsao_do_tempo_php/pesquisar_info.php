<?php

require_once("Request.php");

function convert_to_URL($string) {
    $string = preg_replace('/[áàâãäå]/ui', 'a', $string);
    $string = preg_replace('/[éèêë]/ui', 'e', $string);
    $string = preg_replace('/[íìîï]/ui', 'i', $string);
    $string = preg_replace('/[óòôõö]/ui', 'o', $string);
    $string = preg_replace('/[úùûü]/ui', 'u', $string);
    $string = preg_replace('/[ç]/ui', 'c', $string);
    
    return $string;
}

if(isset($_GET["cityName"])){
    $name_code = urlencode(convert_to_URL($_GET["cityName"]));

    $request = new Request("http://servicos.cptec.inpe.br/XML/listaCidades?city=$name_code", "XML");
    $data = $request->execute();
    if(!$request->isSuccess() OR count($data) == 0){
        header("location: index.php?erro=2");
    }else{
        $arrID = [];
        foreach ($data->cidade as $cidade) {
            $arrID[] = $cidade->id;
        }
        if( count($arrID) > 0) {
            $ids_implode = implode(",", $arrID);
            header("location: previsao.php?ids=$ids_implode");
        }
    }

}else {
    header("location: index.php?erro=1");
}