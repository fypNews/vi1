import os
import requests
import json

tv = os.environ['TV_ID']

tokke = 'https://www.vidio.com/live/' + tv + '/tokens'

headers = {
    'Content-Type': 'application/x-www-form-urlencoded',
    'charset': 'utf-8'
}

response = requests.post(tokke, headers=headers)
result = response.json()
token = result.get('token', '')

# Menyimpan hasil token ke file live/204.json
output_file = 'live/204.json'
with open(output_file, 'w') as file:
    json.dump(result, file)

print(token)
