<?php
# Make sure these values match iiconfig.sh
define('IRC_ROOT', '/tmp/dnd');
define('IRC_SERVER', 'irc.dftba.net');
define('IRC_CHANNEL', '#dnd');

global $IRC_NOTIFY_FORUMS, $IRC_NOTIFY_TOPICS;
$IRC_NOTIFY_FORUMS = array(
	5  => "C1", 
	11 => false, 
	20 => "D&D", 
	30 => "VtR", 
	33 => "test"
); # Array of numeric forum IDs to omit from notifications
$IRC_NOTIFY_TOPICS = array(64, 66); # Array of numeric topic IDs to omit from notifications

function irc_notify($type, $forum_id, $forum_name, $topic_id, $topic_name, $post_id, $subject, $url) {
	global $IRC_NOTIFY_FORUMS, $IRC_NOTIFY_TOPICS;
	if (!array_key_exists($forum_id, $IRC_NOTIFY_FORUMS) && !in_array($topic_id, $IRC_NOTIFY_TOPICS)) {
		return;
	}
	if ($IRC_NOTIFY_FORUMS[$forum_id]) {
		$forum_name = $IRC_NOTIFY_FORUMS[$forum_id];
	}
	switch($type) {
		case 'reply':
			$msg = "[$forum_name] Reply to $topic_name: $url";
			break;
		case 'new':
			$msg = "[$forum_name] New topic $topic_name: $url";
			break;
	}
	file_put_contents(IRC_ROOT.'/'.IRC_SERVER.'/'.IRC_CHANNEL.'/in', $msg."\n");
}

?>
