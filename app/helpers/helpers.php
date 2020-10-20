<?php

//decode catalog  data with it's prices
function decodeCatalogJsonFile()
{
    //Providers JSON File
    $path = storage_path() . env('HOTELS_FILE_PATH');

    $jsonRequest = file_get_contents($path);
    //Decoding JSON
    return json_decode($jsonRequest);
}

function priceForBillType($type, $value)
{
    if ($type == 'USD') {
        return '$' . $value;
    } //assume that 1 usd = 16 EGP in real project get the actual daily value from bank through integration
    else return (int)($value * 16) . ' e£';
}





