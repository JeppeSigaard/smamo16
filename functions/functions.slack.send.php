<?php 


function slack($text = '', $attachments = array(), $room = 'booking') {
    $room = (isset($room)) ? $room : "booking";
    $array = array(
        "channel"       =>  '#'.$room,
        "text"          =>  ($text) ? $text : 'testtext',
    );

    if(is_array($attachments) && !empty($attachments)){
        $array['attachments'] = $attachments;
    }

    $data = "payload=" . json_encode($array);

    $ch = curl_init("https://hooks.slack.com/services/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");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}