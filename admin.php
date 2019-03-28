<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

if (!is_admin()) {
    redirect('login.php');
}
$sql = "SELECT * FROM ".STUD_DETAILS." ORDER BY degree";
$res = $db->getData($sql);
?>

<?php include('includes/templates/header.php'); ?>
<body>
    <?php include('includes/templates/navMenu.php'); ?>
    <div class="container-fluid">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #000;"><span style="color: #FFFFFF;"><?php echo $_SESSION[SES]['uname']; ?><b style="color: #000000;"> (<?php echo $_SESSION[SES]['email']; ?>)</b></span><span style="float: right;">Admin</span></div>
                <div class="panel-body">
                    <?php
                        getMessage();
                    ?>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Sl No.</th>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Application Status</th>
                            <th>Download Resume</th>
                        </tr>
                        <?php
                            for($i = 0; $i < $res['NO_OF_ITEMS']; $i++){
                                $count = $i + 1;
                                $status_query = "SELECT * FROM ".STATUS." WHERE code = '".$res['oDATA'][$i]['status']."'";
                                $code = $db->getData($status_query);
                                echo "<tr>"
                                        . "<td>". $count ."</td>";
                                        if($res['oDATA'][$i]['status'] > 0){
                                            if($res['oDATA'][$i]['status'] == 1){
                                                echo "<td><a href='form.php?uid=".base64_encode($res['oDATA'][$i]['ldapid'])."'>". $res['oDATA'][$i]['roll_number'] ."</a></td>";
                                            }else{
                                                echo "<td><a href='submitted.php?uid=".base64_encode($res['oDATA'][$i]['ldapid'])."'>". $res['oDATA'][$i]['roll_number'] ."</a></td>";
                                            }
                                        }else{
                                            echo "<td>". $res['oDATA'][$i]['roll_number'] ."</td>";
                                        }
                                echo "<td>". $res['oDATA'][$i]['name'] ."</td><td>". $res['oDATA'][$i]['degree'] ."</td>"
                                        . "<td><span class='label label-".$code['oDATA'][0]['color_label']."'>". $code['oDATA'][0]['status_name'] ."</span></td>";
                                        if($code['oDATA'][0]['code'] == 2){
                                            echo "<td><a target='_blank' href='".BASE_URL.'download.php?uid='.  base64_encode($res['oDATA'][$i]['ldapid'])."'><img src='".BASE_URL."images/download_img.png' width='30px' height='30px' /></i></a></td>";
                                        }else{
                                            echo "<td><img src='".BASE_URL."images/diabled_img.png' width='30px' height='30px' /></td>";
                                        }
                                 echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/templates/footer.php'); ?>