<?php
session_start();
require_once("includes/settings.php");
$_SESSION[SES]['admin'] = $_SESSION[SES]['user'] = $_SESSION[SES]['email'] = $_SESSION[SES]['uname'] = NULL;
unset($_SESSION[SES]);
header("Location: new_login.php");
 