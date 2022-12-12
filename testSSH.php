<?php
require __DIR__ . '/vendor/autoload.php';

$ssh = new \phpseclib3\Net\SSH2('149.202.94.223', 7835);
if (!$ssh->login('user', 'ilovedev')) {
    exit('Login Failed');
}

function removeSudoString(String $str) : String {
    return substr_replace($str, "", 0, 31);
}

echo "<pre>";
echo $ssh->exec('pwd');
echo "</pre>";
echo "<pre>";
echo $ssh->exec('ls -la');
echo "</pre>";
echo "<pre>";
echo $ssh->exec('whoami');
echo "</pre>";
echo "<pre>";
echo removeSudoString($ssh->exec('echo "ilovedev" | sudo -S whoami'));
echo "</pre>";

?>