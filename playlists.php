<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="app-wrap">
        <?php
        // normal : BQCmqE3FeNTNPE17LpEJdf0KTzs_rJJzeEF0RlCAY5lfzAtxO66Pz02CxwxHVOnCMq6Jk5IB6UnED6Iw1RcBe8rgN2AhUEJ6rM7MDann-DGKfFS_1R28EptZxnKyXjv5FkhHkidGqcq-arbo4nkbY87kokQc68KTWjg
        // gen    : BQDq5MEP8yC0fIHMSZIQuDtAy9ToDwh0_M4QnwSutc8xNs5FjNfJgtFN2U_w9bNywVuFIpsk0zeYVpG4XP9grxkvFGjBlNqbO52uk2SKJEUvRTrdMf3orDokErTEQav93Id8RdIvKXPnT-BAwLcc1V5Lsj4FqjQT

        $header = [
            "Accept: application/json",
            "Content-Type: application/json", 
            "Authorization: Bearer " . $_SESSION['access_token']
        ];

        //print($_SESSION['access_token']);
        $curlconnection = curl_init();

        curl_setopt($curlconnection, CURLOPT_URL, 'https://api.spotify.com/v1/users/11126649453/playlists');
        curl_setopt($curlconnection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curlconnection, CURLOPT_RETURNTRANSFER, TRUE);

        $data = curl_exec($curlconnection);
        $data = json_decode($data, true);

        echo '<pre>';
        //echo print_r($data);
        echo '</pre>';

        if(isset($data['error'])) // if the token is expired
        {
            //echo "mamy blad";
            header("Location: index.php");
        }

        //print("img url " . $data['items'][0]['images'][0]['url']);

        //print_r($data);
        //print(file_get_contents("https://i.scdn.co/image/ab67706c0000bebbccdbb1d418b3d19560d38f27"));
        print('<div class="playlists">');
        $counter = 0;
        foreach($data['items'] as $playlist)
        {
            //$imgUrl = $playlist['images'][0]['url'];

            print('<div>');
            print('<img src="' . $playlist['images'][0]['url'] . '">');
            print($playlist['name'] . "<br>"); //  $playlist['id']
            print("tracks : " . $playlist['tracks']['total']);
            print('</div>');
            $songcurlcon = curl_init();

            $counter++;
        }

        print('</div>');

        print("<br><br>count of available playlists " . $counter);

        ?>
    </div>

</body>
</html>