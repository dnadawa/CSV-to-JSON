import requests

url = "https://spreadsheets.google.com/feeds/list/1RFc0ASrwMJThAo-PrYOtwxWFUoI7RugYcDEEPi9oeTk/od6/public/values?alt=json"

r = requests.get(url)
data =r.json()

entries = data['feed']['entry']
newjsonlist = []

for i in entries:
    id = i['gsx$id']['$t']
    title = i['gsx$title']['$t']
    pubDate = i['gsx$pubdate']['$t']
    thumbUrl = i['gsx$thumburl']['$t']
    imageURL = i['gsx$imgurl']['$t']
    videoUrl = 
    subtitleUrl = 
    description = 
    print(i['gsx$id']['$t'])
