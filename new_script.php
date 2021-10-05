<?php

if (($open = fopen("https://docs.google.com/spreadsheets/d/e/2PACX-1vRf3TIbvfaXa5t0LQO2AK11ybZWfoeZy5CzuaygP3uE7xpzElYtjf4LekicE49Toc7xNyrpQcKC3qEP/pub?gid=0&single=true&output=csv", "r")) !== FALSE)
{

    while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
    {
        $array[] = $data;
    }

    fclose($open);
}
$newList = array();
for($i=1;$i<sizeof($array);$i++) {
    $id = $array[$i][0];
    $title = $array[$i][1];
    $pubDate = $array[$i][2];
    $thumbUrl = $array[$i][3];
    $imageUrl = $array[$i][4];
    $videoUrl = $array[$i][5];
    $subtitleUrl = $array[$i][6];
    $categories = $array[$i][7];
    $description = $array[$i][8];
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