<?php
# Make sure these values match iiconfig.sh
define('IRC_ROOT', '/tmp/dnd');
define('IRC_SERVER', 'chat.dftba.net');
define('IRC_CHANNEL', '#dnd-test');


function irc_notify($type, $forum, $topic, $url) {
	switch($type) {
		case 'reply':
			$msg = "Reply to $topic in $forum $url";
			break;
		case 'new':
			$msg = "New topic in $forum: $topic $url";
			break;
	}
	file_put_contents(IRC_ROOT.'/'.IRC_SERVER.'/'.IRC_CHANNEL.'/in', $msg."\n");
}

?>
