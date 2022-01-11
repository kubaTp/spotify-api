
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php
    // normal : BQCmqE3FeNTNPE17LpEJdf0KTzs_rJJzeEF0RlCAY5lfzAtxO66Pz02CxwxHVOnCMq6Jk5IB6UnED6Iw1RcBe8rgN2AhUEJ6rM7MDann-DGKfFS_1R28EptZxnKyXjv5FkhHkidGqcq-arbo4nkbY87kokQc68KTWjg
    // gen    : BQDq5MEP8yC0fIHMSZIQuDtAy9ToDwh0_M4QnwSutc8xNs5FjNfJgtFN2U_w9bNywVuFIpsk0zeYVpG4XP9grxkvFGjBlNqbO52uk2SKJEUvRTrdMf3orDokErTEQav93Id8RdIvKXPnT-BAwLcc1V5Lsj4FqjQT

    $header = [
        "Accept: application/json",
        "Content-Type: application/json", 
        "Authorization: Bearer BQDq5MEP8yC0fIHMSZIQuDtAy9ToDwh0_M4QnwSutc8xNs5FjNfJgtFN2U_w9bNywVuFIpsk0zeYVpG4XP9grxkvFGjBlNqbO52uk2SKJEUvRTrdMf3orDokErTEQav93Id8RdIvKXPnT-BAwLcc1V5Lsj4FqjQT"
    ];

    $curlconnection = curl_init();

    curl_setopt($curlconnection, CURLOPT_URL, 'https://api.spotify.com/v1/users/11126649453/playlists');
    curl_setopt($curlconnection, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curlconnection, CURLOPT_RETURNTRANSFER, TRUE);

    $data = curl_exec($curlconnection);
    $data = json_decode($data, true);


    print("a type of the result is " . gettype($data));
    print_r($data);

    /*
    foreach($data['items'] as $playlist)
    {
        if($playlist['description'] > "")
        {
            print_r($playlist);
        }
    }

    function encodeURIComponent($str) 
    {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }
    */
    //print(encodeURIComponent('https://goldencodedev.pl'));
    //$url = 'https://accounts.spotify.com/authorize?client_id=e43f2a20ac2b431dac748321406b0151&response_type=code&redirect_uri=https%3A%2F%2Fgoldencodedev.pl';
    //$data2 = file_get_contents($url);
    //print($data2);
    ?>
</body>
</html>