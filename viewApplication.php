<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();

if (!is_loggedin()) {
    redirect('login.php');
}
$sql = "SELECT status FROM " . STUD_DETAILS . " WHERE ldapid = '" . $_SESSION[SES]['user'] . "'";
$res = $db->getData($sql);
if ($res['oDATA'][0]['status'] == 0) {
    redirect($BASE_URL . "login.php");
}
?>

<?php include('includes/templates/header.php'); ?>
<body>
    <?php include('includes/templates/navMenu.php'); ?>
    <div class="container-fluid">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #000;"><span style="color: #FFFFFF;"><?php echo $_SESSION[SES]['uname']; ?><b style="color: #000000;"> (<?php echo $_SESSION[SES]['email']; ?>)</b></span></div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
    <?php include('includes/templates/footer2.php'); ?>