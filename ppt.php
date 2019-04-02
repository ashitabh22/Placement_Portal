<?php $title = 'ppt' ?>

<?php
session_start();
require_once("includes/database.php");
require_once("includes/settings.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

if (is_loggedin()) {
    redirect('new_login.php');
}

$sql = "SELECT company_name, company_id FROM registered_companies";
$res = $db->getData($sql);

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $company = $_POST['company'];
    $pptdate = $_POST['pptdate'];

    $name = strval(strval($company) . '_' . strval($pptdate));
    $alter_table = "ALTER TABLE ppt_list ADD `" . $name . "` VARCHAR(40)";

    if (mysql_query($alter_table)) {
        redirect('pptList.php');
    } else {
        die(mysql_error());
    }
}

?>

<?php include('includes/templates/top_bar_admin.php'); ?>

<!-- <body> -->
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
                                        <h3 class="panel-title"> PPT Attendance</h3>
                                    </div>


                                    <br>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2">
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <section class="panel panel-info">
                                                <header class="panel-heading">
                                                    Attendance
                                                </header>
                                                <div class="panel-body">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-2 col-xs-2">
                                                        </div>
                                                        <div class="col-md-8 col-xs-8">
                                                            <form name="myform" method="POST" action="">
                                                                <label for="PPT date">Company &nbsp &nbsp</label>
                                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="company">
                                                                    <option selected>Choose...</option>
                                                                    <?php for ($i = 0; $i < ($res['NO_OF_ITEMS']); $i++) { ?>
                                                                    <option value=<?php echo $res['oDATA'][$i]['company_name'] ?>><?php echo $res['oDATA'][$i]['company_name'] ?></option>
                                                                    <?php 
                                                                } ?>
                                                                </select>
                                                                <br>
                                                                <br>
                                                                <br>

                                                                <label for="PPT date">Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
                                                                <input type="date" name="pptdate" id="pptdate">
                                                                <br>
                                                                <br>
                                                                <br>



                                                                <div class="row">
                                                                    <div class="col-md-4 col-xs-4">
                                                                    </div>
                                                                    <div class="col-md-4 col-xs-4">
                                                                        <button type="submit" class="btn btn-primary" name="submit">
                                                                            &nbsp; Submit
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-4 col-xs-4">
                                                                    </div>
                                                                </div>


                                                            </form>
                                                        </div>
                                                        <div class="col-md-2 col-xs-2">
                                                        </div>

                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                        </div>
                                    </div><br><br>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </body>
        </div>
    </div>
</div> 