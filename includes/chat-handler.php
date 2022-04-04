<?php
/**
 * HERE WE HANDLE THE DATA WITH THE PUSHER API
 * For more information about visit https://pusher.com/docs/
 */
require_once dirname(__DIR__) . '/vendor/autoload.php' ;
require_once dirname(__DIR__) . '/database/giverchat-functions.php';

// PUSHER STUFF
$options = array(
    'cluster' => 'us2',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    'APP_ID',               /*    APP_ID      */
    'APP_KEY',              /*   APP_KEY     */
    'APP_SECRET',           /*  APP_SECRET  */
    $options
);

// VARIABLES
$data['user_id']        = $_POST['user_id'];
$data['user_firstname'] = $_POST['user_firstname'];
$data['user_lastname']  = $_POST['user_lastname'];
$data['promo']          = $_POST['promo'];
$data['message']        = $_POST['message'];
$data['username']       = $_POST['user_firstname'].' '.$_POST['user_lastname'];

/**
 * SET the variables in the GiverChat Class
 */
$chat_object    =   new GiverChatFunctions;
$chat_object->setUserId($data['user_id']);
$chat_object->setUserFirstName($data['user_firstname']);
$chat_object->setUserLastName($data['user_lastname']);
$chat_object->setUserPromo($data['promo']);
$chat_object->setMessage($data['message']);
// SAVE MESSAGE IN DATABASE
$chat_object->save_chat();


// SEND MESSAGE BACK WITH PUSHER
$pusher->trigger('giver-app', 'my-event', $data);