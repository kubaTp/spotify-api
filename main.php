<?php
// normal : BQCmqE3FeNTNPE17LpEJdf0KTzs_rJJzeEF0RlCAY5lfzAtxO66Pz02CxwxHVOnCMq6Jk5IB6UnED6Iw1RcBe8rgN2AhUEJ6rM7MDann-DGKfFS_1R28EptZxnKyXjv5FkhHkidGqcq-arbo4nkbY87kokQc68KTWjg
// gen    : BQDq5MEP8yC0fIHMSZIQuDtAy9ToDwh0_M4QnwSutc8xNs5FjNfJgtFN2U_w9bNywVuFIpsk0zeYVpG4XP9grxkvFGjBlNqbO52uk2SKJEUvRTrdMf3orDokErTEQav93Id8RdIvKXPnT-BAwLcc1V5Lsj4FqjQT

$header = [
    "Accept: application/json",
    "Content-Type: application/json", 
    "Authorization: Bearer BQDHYr573ug3v4cmrM_0E9hxMqLWBWXz8KO0XkzWNfD39GIbWJ-7fNDhvH1L-RNEsST5bZPU3oVJ5ab2zZncafYC8DxKKMEnHjx9oXFSDNKEkS0OG8KecdbAhhvhWRbfNEqn3XChACRko6vGM4TBzxBdxmwXeeOuWAXpC1Nlu3RHTisFGJRHBg"
];

$curlconnection = curl_init();

curl_setopt($curlconnection, CURLOPT_URL, 'https://api.spotify.com/v1/users/11126649453/playlists?limit=10&offset=5');
curl_setopt($curlconnection, CURLOPT_HTTPHEADER, $header);
curl_setopt($curlconnection, CURLOPT_RETURNTRANSFER, TRUE);

$data = curl_exec($curlconnection);
$data = json_decode($data, true);


print("a type of the result is " . gettype($data));
print_r($data);

foreach($data['items'] as $playlist)
{
    if($playlist['description'] > "")
    {
        print_r($playlist);
    }
}

//print(encodeURIComponent('https://goldencodedev.pl'));
//$url = 'https://accounts.spotify.com/authorize?client_id=e43f2a20ac2b431dac748321406b0151&response_type=code&redirect_uri=https%3A%2F%2Fgoldencodedev.pl';
//$data2 = file_get_contents($url);
//print($data2);

//curl -X "GET" "https://api.spotify.com/v1/users/11126649453/playlists" -H "Accept: application/json" -H "Content-Type: application/json" -H "Authorization: Bearer BQDHYr573ug3v4cmrM_0E9hxMqLWBWXz8KO0XkzWNfD39GIbWJ-7fNDhvH1L-RNEsST5bZPU3oVJ5ab2zZncafYC8DxKKMEnHjx9oXFSDNKEkS0OG8KecdbAhhvhWRbfNEqn3XChACRko6vGM4TBzxBdxmwXeeOuWAXpC1Nlu3RHTisFGJRHBg"

?>
