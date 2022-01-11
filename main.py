import requests
import json

# PYTHON EXAMPLE OF GETTING ALL USERS PLAYLIST
# WARNINING : NEEDS A WORKING ACCES TOKEN

url = "https://api.spotify.com/v1/users/11126649453/playlists?limit=10&offset=5"
header = {"Content-Type" : "application/json", "Authorization": "Bearer BQA9WAHeEkCZKIVWEz08JuA6P6mI0JfONDNqWDTvDbOQposlvutUHIXItcMX4cM3t3uMFHS-mCF0jrf46WcfM32SGP5wpcfdwxAVpTmF1v-f_FxK0s5C1VP7eQ3Dm6Cut8PrSW84jRyUKRC6qYZHk8S9Uif5gSHl6I4"}
r = requests.get(url, headers = header)
r = r.json()

print(r)
for playlist in r['items']:
    description = playlist['description']

    if description != "":
        print("desc : " + description)