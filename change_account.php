<?php
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/User.php');
require_once(dirname(__FILE__).'/Account.php');

$user = User::require_login();

if (array_key_exists('account', $_GET)) {
	$account = Account::getByID($_GET['account']);
	if (!is_null($account))
	{
		$account->setAsCurrent($user);
	}
}

if (array_key_exists('return', $_GET)) {
	$return_to = $_GET['return'];
}
else
{
	$return_to = UserConfig::$USERSROOTURL.'/manage_account.php';
}

header('Location: '.$return_to);
