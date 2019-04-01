<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");


$db2 = new SiteData();
$sql2 = "SELECT * FROM applied_students INNER JOIN personal_details USING (ldapid) WHERE  status_code =  6";
$res2 = $db2->getData($sql);

$db = new SiteData();
$sql = "SELECT * FROM " . PLACEMENT_STATUS;
$res = $db->getData($sql);

if (isset($_POST['OK']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['OK'];
    $var = $_POST['place'];

    if (isset($var)) {
        $place = 1;
        $ldap = sadfdfs;
        $roll_no = asdf;
        $target_dir = "uploads/";
        //$target_file = $target_dir . basename($_FILES['filename']['name']);
        $filename = $_POST['filename'];

        if ($_FILES["filename"]["name"] != '') {
            if ($_FILES["filename"]["size"] > 10000000000) {
                $msg = "File size should not exceed 10MB";
                setMessage('danger', $msg);
                echo "danger";
                redirect($url);
            } else {
                $FileType = strtolower(pathinfo(basename($_FILES["filename"]["name"]), PATHINFO_EXTENSION));
                $target_file = $target_dir . "letter_" . $ldap . $roll_no . $FileType;
                //$destination = FILE_PATH . $uid . '.' . $FileType;
                if ($FileType == 'pdf' || $FileType == 'PDF') {
                    echo "ok";
                    if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
                        echo "uploaded";
                    } else {
                        echo "uplaod error";
                        die();
                    }
                    $query = "UPDATE placement_status SET upload = '" . $filename . "', place = '" . $place . "'  WHERE name = '" . $name . "'";
                    if (mysql_query($query)) {
                        redirect('finalPlacementStatus.php');
                    } else {
                        die(mysql_error());
                    }
                } else {
                    $msg = "Only .pdf and .PDF documents are allowed";
                    setMessage('danger', $msg);
                    redirect($url);
                }
            }
        }
    } else {
        $place = 0;
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['filename']['name']);

        $filename = $_POST['filename'];
        echo $filename;
        echo $target_file;

        if ($_FILES['filename']['name'] != '') {
            if ($_FILES['filename']['size'] > 10000000000) {
                $msg = "File size should not exceed 10MB";
                setMessage('danger', $msg);
                redirect($url);
            } else {
                $FileType = strtolower(pathinfo(basename($_FILES['filename']['name']), PATHINFO_EXTENSION));
                $destination = $target_file . "" . $filename . '.' . $FileType;
                if ($FileType == 'pdf' || $FileType == 'PDF') {
                    move_uploaded_file($filename, $destination);
                    $query1 = "UPDATE placement_status SET upload = '" . $filename . "', place = '" . $place . "'  WHERE name = '" . $name . "'";
                    if (mysql_query($query)) {
                        redirect('finalPlacementStatus.php');
                    } else {
                        die(mysql_error());
                    }
                } else {
                    $msg = "Only .pdf and .PDF documents are allowed";
                    setMessage('danger', $msg);
                    redirect($url);
                }
            }
        }
    }
}

?>


<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_admin.php'); ?>

<!--header and top bar ends here-->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="content">

                <body id="content">
                    <style type="text/css">
                        .red {
                            color: #f20000;
                        }

                        #webdet {
                            display: none;
                        }
                    </style>
                    <div class="wrapper">
                        <div id="sub-header"></div>
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2 class="panel-title">Final Placement Status</h2>
                                        </div>
                                        <div class="row">
                                            &nbsp &nbsp &nbsp &nbsp &nbsp
                                            <div class="col-md-3 col-xs-6 col-sm-3">
                                                <input type="text" placeholder="Search by Company" id="searchppt">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="panel-body">
                                            <div class="ex1">
                                                <table class="table table-hover" id="stdlist">
                                                    <tr>
                                                        <th>LDAP ID</th>
                                                        <th>Name</th>
                                                        <th>Roll no.</th>
                                                        <th>Upload</th>
                                                        <th></th>
                                                    </tr>

                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>

                                                    <form method="post" action="" enctype="multipart/form-data">

                                                        <tr>
                                                            <td><?php echo $res2['oDATA'][$i]['ldapid'] ?></td>
                                                            <td><?php echo $res2['oDATA'][$i]['name'] ?></td>
                                                            <td><?php echo $res2['oDATA'][$i]['roll_number'] ?></td>


                                                            <td>
                                                                <label class="btn btn-file">
                                                                    <input type="file" name="filename">
                                                                </label>
                                                            </td>

                                                            <td><button type="submit" class="btn btn-info" value="<?php echo $res2['oDATA'][$i]['ldapid'] ?>" name="OK">OK
                                                                </button>
                                                            </td>

                                                        </tr>

                                                    </form>
                                                    <?php 
                                                } ?>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </body>
            </div>
        </div>
    </div>

</body>