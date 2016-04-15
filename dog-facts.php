<?php
header('Content-Type: application/json');

# Grab some of the values from the slash command, create vars for post back to Slack
$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];
# Check the token and make sure the request is from our team 
if($token != 'adsfasdfasdfadf'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. Check your script.";
  die($msg);
  echo $msg;
}

require_once('./facts.php');
$facts_size = count($facts_list)-1;
$rand_seeder = mt_rand(0, $facts_size);
$rand_keys = array_rand($facts_list, $rand_seeder);
$fact = array_rand($rand_keys, 1);

$response_array = array(
    'response_type'=> 'in_channel',
    'text'=> $facts_list[$fact],
    'attachments'=> array(
            array('text'=> ':pugsley:')
        )
);


echo json_encode($response_array);
