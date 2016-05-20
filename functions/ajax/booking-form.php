<?php 
add_action( 'wp_ajax_booking_form', 'smamo_booking_form' );
add_action( 'wp_ajax_nopriv_booking_form', 'smamo_booking_form' );

function smamo_booking_form(){
    
    $navn = (isset($_POST['navn'])) ? wp_strip_all_tags($_POST['navn']): false;
    $email = (isset($_POST['email'])) ? wp_strip_all_tags($_POST['email']): false;
    $firma = (isset($_POST['firma'])) ? wp_strip_all_tags($_POST['firma']): false;
    $telefon = (isset($_POST['telefon'])) ? wp_strip_all_tags($_POST['telefon']): false;
    $budget = (isset($_POST['budget'])) ? wp_strip_all_tags($_POST['budget']): false;
    $about = (isset($_POST['about'])) ? $_POST['about'] : false;
    
    
    if (!$navn || !$email){
        $response['error'] = 'Mangler vigtige oplysninger';
        wp_die(json_encode($response));
    }
    
    // Indstil about
    $about_string = '';
    $i = 0;
    if(is_array($about)){
        foreach($about as $a){
            $i++;
            $about_string .= ($i === 1) ? $a : ', ' . $a;
        }
    }
    
    if(function_exists('slack')) {
        $text = $navn . ' har lige send en anmodning om et møde!';
        $attachments = array(
            array(
                'pretext' => '',
                'color' => '#669999',
                'fields' => array(
                    
                    array(
                        'title' => 'Navn',
                        'value' => $navn,
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Firma',
                        'value' => $firma,
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Email',
                        'value' => '<mailto:'.$email.'|'.$email.'>',
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Telefon',
                        'value' => '<tel:'.$telefon.'|'.$telefon.'>',
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Vil gerne holde møde om',
                        'value' => $about_string,
                        'short' => false,
                    ),
                    
                    array(
                        'title' => 'Budget ca.',
                        'value' => $budget,
                        'short' => false,
                    ),
                    
                ),
            ),
        );
        
        
        // Send
        $response['slack_curl'] = slack($text,$attachments); 
    }
    
    
    
    
    wp_die(json_encode($response));
}