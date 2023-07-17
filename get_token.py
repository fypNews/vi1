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

print(token)
