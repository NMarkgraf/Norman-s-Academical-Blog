<?php

/**
* This is a functioning example of a simple WebHook.
* You'll need to extensively tweak this script to fit your needs.
**/

class Site
{
    public static function checkout($site)
    {
        $git_folder = '/var/www/vhosts/sefiroth.net/httpdocs/nab/';
        if ($site == 'sefiroth.net')
        {
            shell_exec('cd ' . $git_folder . ' && ./updateFromGitHub.sh');
        }
    }
}

Site::checkout("");

// Change the $_REQUEST['key'] below to a new long unique string.

if ($_REQUEST['key'] == 'DoItRoght!' && isset($_REQUEST['payload']))
{
    $payload = json_decode($_REQUEST['payload']);
    $branch = $payload->ref;
    $site_name = strtolower($payload->{'repository'}->{'name'});
    Site::checkout($site_name);
    if ($branch == 'refs/heads/master')
    {
/*
        $git_dir = '/srv/www/' . $site_name . '/' . $site_name . '.git/';
        $output = shell_exec('cd ' . $git_dir . ' && git reset --hard HEAD && git pull origin master:master');
        $status = shell_exec('cd ' . $git_dir . ' && git rev-parse --short HEAD');
*/
        //Log the request and result
        file_put_contents('webhook.log', print_r($payload, TRUE) . "\n$output\nCurrent hash is $status\n#############################\n", FILE_APPEND);

        //Put code into production
        
    }
    else
    {
        exit();
    }
}
else
{
    exit();
}
