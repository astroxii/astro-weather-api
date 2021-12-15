<?php

    $key = getenv("API_KEY");

    function CORS()
    {
        header("Access-Control-Allow-Origin: https://astroxii.github.io");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: access-control-allow-origin, Access-Control-Allow-Origin, Origin");
        header("Access-Control-Max-Age: 0");
    }

    if(key_exists("name", $_GET))
    {
        $q = $_GET['name'];
        $weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?units=metric&lang=pt_br&q=$q&appid=$key");

        CORS();

        if($weather && !is_null($weather))
        {
            echo $weather;
        }
        else
        {
            echo json_encode(["error" => "Nenhuma cidade encontrada."]);
        }
    }
    else if(key_exists("lat", $_GET) && key_exists("lon", $_GET))
    {
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?units=metric&lang=pt_br&lat=$lat&lon=$lon&appid=$key");

        CORS();
        
        if($weather && !is_null($weather))
        {
            echo $weather;
        }
        else
        {
            echo json_encode(["error" => "Nenhuma cidade encontrada."]);
        }
    }
    else
    {
        echo json_encode(["error" => "Sem busca definida."]);
    }

?>