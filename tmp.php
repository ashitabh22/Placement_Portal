
<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

$q = $_REQUEST['q'];
$id= $_REQUEST['id'];

$que = "SELECT company_id FROM ".ALL_JOBS." WHERE company_id = ".$q;
$r = $db->getData($que);
$value = $r['NO_OF_ITEMS'];
if($value==0){
    setMessage('danger', "No jobs posted");
    echo getMessage();?>
    <script type="text/javascript">
    console.log("asdfjl;a sjdf");
    //$("ppt_button").prop("disabled",true);
    document.getElementById("ppt_button").disabled = true;  </script>

    <?php }
?>
    