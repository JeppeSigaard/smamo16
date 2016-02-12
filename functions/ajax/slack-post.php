<?php 

define('WP_USE_THEMES', false); 
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-Type: application/json');
require '../../../../../wp-load.php';


$response = array();

$api_token = 'pZAgqd2yeThKYLAoUpMq5ncv';
$slash_token = 'DAdzPuJsPv9kjeute8r5Pynk';
$sent_token = isset($_POST['token']) ? wp_strip_all_tags($_POST['token']) : false;
$team_id = isset($_POST['team_id']) ? wp_strip_all_tags($_POST['team_id']) : '';
$team_domain = isset($_POST['team_domain']) ? wp_strip_all_tags($_POST['team_domain']) : '';
$channel_id = isset($_POST['channel_id']) ? wp_strip_all_tags($_POST['channel_id']) : '';
$timestamp = isset($_POST['timestamp']) ? wp_strip_all_tags($_POST['timestamp']) : '';
$user_id = isset($_POST['user_id']) ? wp_strip_all_tags($_POST['user_id']) : '';
$user_name = isset($_POST['user_name']) ? wp_strip_all_tags($_POST['user_name']) : '';
$text = isset($_POST['text']) ? wp_strip_all_tags($_POST['text']) : '';
$trigger_word = isset($_POST['trigger_word']) ? wp_strip_all_tags($_POST['trigger_word']) : '';
$command = isset($_POST['command']) ? wp_strip_all_tags($_POST['command']) : false;

// afvis Albert
if($user_id === 'USLACKBOT'){
    exit;
}

// Token tjek
if(!$sent_token || $api_token !== $sent_token){
    
    if(!$command || $command !== '/log' || $slash_token !== $sent_token ){
        
        $response['text'] = 'Tokens matcher ikke. Spørg @jeppe.';
        echo json_encode($response);
        exit;
        
    }
}



// Bed om ID
if($text === 'ID'){
    $response['text'] = '@'.$user_name.': Din ID er '. $user_id .'. (Slet denne besked, når din ID er sat, for en sikkerheds skyld)';
    echo json_encode($response);
    exit;
    
}


$team_member = get_posts(array(
    'posts_per_page' => 1,
    'post_type' => 'team',
    'meta_key' => 'slack_id',
    'meta_value' => $user_id,
));

if(empty($team_member)){
    $response['text'] = '@'.$user_name.': Du mangler på hjemmesiden. Start med at oprette dig selv under Team, og tilføj din slack ID i feltet "Slack ID". Din ID er '. $user_id .'. (Slet denne besked, når din ID er sat, for en sikkerheds skyld). Spørg @jeppe hvis du er i tvivl.';
    echo json_encode($response);
    exit;
}


foreach($team_member as $tm){
    
    $author = $tm->post_author;
    
    if($author === ''){
        
        $response['text'] = '@'.$user_name.': Du mangler at indstille dig selv som forfatter af din team post på hjemmesiden. Start med at oprette dig selv under Team, og tilføj din slack ID i feltet "Slack ID". Din ID er '. $user_id .'. (Slet denne besked, når din ID er sat, for en sikkerheds skyld). Spørg @jeppe hvis du er i tvivl.';
        echo json_encode($response);
        exit;    
    }
    
    $new_post = wp_insert_post(array(
        'post_content'   => $text,
        'post_title'     => wp_trim_words($text, $num_words = 8, $more = ' ...'),
        'post_status'    => 'publish',
        'post_type'      => 'logbog',
        'post_author'    => $author,
    ),true);
    
    if(is_wp_error($new_post)){
        $response['text'] = '@'.$user_name.': Noget gik galt under oprettelsen af den nye log: ' .  $new_post->get_error_message();
        echo json_encode($response);
        exit;  
    }
    
    elseif($command && $command === '/log'){
        $response['text'] = '@'.$user_name.': Din log blev sendt til smartmonkey.dk';
        
        $response['response_type'] = 'in_channel';
        $response['attachments'] = array(
            0 => array(
                'text' => $text
            ),
        );
        
        echo json_encode($response);
        exit;
    }
    
    else{
        exit;
    }
}



