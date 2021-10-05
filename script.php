<?php

$response = file_get_contents("https://spreadsheets.google.com/feeds/list/1RFc0ASrwMJThAo-PrYOtwxWFUoI7RugYcDEEPi9oeTk/od6/public/values?alt=json");

$data = json_decode($response);
$newArray = $data->{'feed'}->{'entry'};
$newList = array();
for($i=0;$i<sizeof($newArray);$i++){
    $id = $newArray[$i]->{'gsx$id'}->{'$t'};
    $title = $newArray[$i]->{'gsx$title'}->{'$t'};
    $pubDate = $newArray[$i]->{'gsx$pubdate'}->{'$t'};
    $thumbUrl = $newArray[$i]->{'gsx$thumburl'}->{'$t'};
    $imageUrl = $newArray[$i]->{'gsx$imgurl'}->{'$t'};
    $videoUrl = $newArray[$i]->{'gsx$videourl'}->{'$t'};
    $subtitleUrl = $newArray[$i]->{'gsx$subtitlesurl'}->{'$t'};
    $description = $newArray[$i]->{'gsx$description'}->{'$t'};
    $categories = $newArray[$i]->{'gsx$categories'}->{'$t'};
    $formatted = array(
        'id'=>$id,
        'title'=>$title,
        'pubDate'=>$pubDate,
        'thumbURL'=>$thumbUrl,
        'imgURL'=>$imageUrl,
        'videoURL'=>$videoUrl,
        'subtitlesURL'=>$subtitleUrl,
        'description'=>$description,
        'categories'=>array($categories),
    );
    array_push($newList, $formatted);
}

$finalJSON = array(
    'media'=>$newList
);

$result = json_encode($finalJSON);
echo $result;