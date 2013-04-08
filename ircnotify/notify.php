<?php
# Make sure these values match iiconfig.sh
define('IRC_ROOT', '/tmp/dnd');
define('IRC_SERVER', 'chat.dftba.net');
define('IRC_CHANNEL', '#dnd-test');


function irc_notify($msg) {
	file_put_contents(IRC_ROOT.'/'.IRC_SERVER.'/'.IRC_CHANNEL.'/in', $msg."\n");
}

?>
