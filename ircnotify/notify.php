<?php
# Make sure these values match iiconfig.sh
define('IRC_ROOT', '/tmp/dnd');
define('IRC_SERVER', 'chat.dftba.net');
define('IRC_CHANNEL', '#dnd-test');

$IRC_IGNORE_FORUMS = array(); # Array of numeric forum IDs to omit from notifications
$IRC_IGNORE_TOPICS = array(); # Array of numeric topic IDs to omit from notifications


function irc_notify($type, $forum_id, $forum_name, $topic_id, $topic_name, $post_id, $subject, $url) {
	global $IRC_IGNORE_FORUMS, $IRC_IGNORE_TOPICS;
	if (in_array($forum_id, $IRC_IGNORE_FORUMS)) {
		return;
	}
	if (in_array($topic_id, $IRC_IGNORE_TOPICS)) {
		return;
	}
	switch($type) {
		case 'reply':
			$msg = "Reply to $topic_name in $forum_name $url";
			break;
		case 'new':
			$msg = "New topic in $forum_name: $topic_name $url";
			break;
	}
	file_put_contents(IRC_ROOT.'/'.IRC_SERVER.'/'.IRC_CHANNEL.'/in', $msg."\n");
}

?>
