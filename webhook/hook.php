<?php

$output = shell_exec('cd /var/www/vhosts/sefiroth.net/httpdocs/nab/ && ./updateFromGitHub.sh && ./updateWebhook.sh');
$status = shell_exec('cd /var/www/vhosts/sefiroth.net/httpdocs/nab/ && git rev-parse --short HEAD');

//Log the request and result

if (isset($_REQUEST['payload']))
{
    $payload = json_decode($_REQUEST['payload']);
    file_put_contents('webhook.log', print_r($payload, TRUE) . "\n$output\nCurrent hash is $status\n#############################\n", FILE_APPEND);

} else {
    file_put_contents('webhook.log', print_r($_REQUEST, TRUE) . "\n$output\nCurrent hash is $status\n#############################\n", FILE_APPEND);
}

exit()

?>