<?php
session_start();
require_once("includes/settings.php");
$_SESSION[SES]['user'] = NULL;
$_SESSION[SES]['admin'] = NULL;

unset($_SESSION[SES]['admin']);
unset($_SESSION[SES]['user']);
unset($_SESSION[SES]);
header("Location: login.php");
?>