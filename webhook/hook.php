<?php

$current_dir = getcwd();

chdir('/var/www/vhosts/sefiroth.net/httpdocs/nab/');
$output = system('updateFromGitHub.sh');

chdir('/var/www/vhosts/sefiroth.net/httpdocs/nab/');
$output2 = system('updateWebHook.sh > &1');

chdir('/var/www/vhosts/sefiroth.net/httpdocs/nab/')
$status = system('git rev-parse --short HEAD > &1');


//Log the request and result

$payload = "***";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $payload = json_decode($_POST['payload']);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
     $payload = json_decode($_GET['payload']);
} 

$json_error = json_last_error();

chdir($current_dir);
file_put_contents('webhook.log', "Payload: " . print_r($payload, TRUE) . "\n Lasterror:". $json_error. "\n$output\n$output2\nCurrent hash is $status\n#############################\n", FILE_APPEND);

switch($json_error) 
{
        case JSON_ERROR_NONE:
            echo ' - Keine Fehler';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximale Stacktiefe überschritten';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Unterlauf oder Nichtübereinstimmung der Modi';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unerwartetes Steuerzeichen gefunden';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntaxfehler, ungültiges JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Missgestaltete UTF-8 Zeichen, möglicherweise fehlerhaft kodiert';
        break;
        default:
            echo ' - Unbekannter Fehler';
        break;
}

/*
if (empty($_POST)) 
{
    echo "Mist!";
}

if (empty($_SERVER))
{
    echo "SUPERMIST!";
} else {
  print_r($_SERVER);
  print_r($_POST);
  print_r($_GET);
}
*/

chdir($current_dir);


?>
