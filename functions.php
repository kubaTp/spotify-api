<?php

function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
        $randomString .= $characters[rand(0, $charactersLength - 1)];

    return $randomString;
}

function encodeURIComponent($str) 
{
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

function fetch_new_token_access_token()
{
    $url = "https://accounts.spotify.com/authorize?client_id=e43f2a20ac2b431dac748321406b0151&response_type=code&redirect_uri=http%3A%2F%2F192.168.64.2%2Fspotify-playlists&show_dialog=false&scope=user-read-private&scope=3igQ0BTFXpaWmzvG";
    $clients = "e43f2a20ac2b431dac748321406b0151:f331678cd91e40598c4072f740dacbb5";
    $headers = [
        "Authorization:Basic " . base64_encode($clients),
        "Content-Type:application/x-www-form-urlencoded"
    ];

    //spotify url
    $url = 'https://accounts.spotify.com/api/token';
    $redirect_uri = "http://192.168.64.2/spotify-playlists";

    //data in post request
    $fields = [
        'code'         => $_GET['code'],
        'redirect_uri' => $redirect_uri,
        'grant_type'   => 'authorization_code'
    ];

    //url-ify data for post response
    $fields_string = http_build_query($fields);

    $ch = curl_init(); // init a request to a get token

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    $result = curl_exec($ch);
    $result = json_decode($result, true);

    //print_r($result);
    $newtoken = $result['access_token'];

    return $newtoken;
}

?>
