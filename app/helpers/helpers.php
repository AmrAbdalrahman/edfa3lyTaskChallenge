<?php

//decode catalog  data with it's prices
function decodeProvidersJsonFile()
{
    //Providers JSON File
    $path = storage_path() . env('HOTELS_FILE_PATH');

    $jsonRequest = file_get_contents($path);
    //Decoding JSON
    return json_decode($jsonRequest);
}





