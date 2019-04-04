<?php


require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

$q = $_REQUEST['q'];

$que = "SELECT * FROM all_jobs WHERE company_id = '" . $q . "' ";
$r = $db->getData($que);

$value = $r['NO_OF_ITEMS'];

echo("Number of posted Jobs:  ".$value);
                                                


?>