<?php
$fb = new Facebook\Facebook([
  'app_id' => '148790328806830',
  'app_secret' => 'a74087672e479d44301c6766495bd558',
  'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>