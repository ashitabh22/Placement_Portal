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
$company_id = $_POST['company'];




$sql = "SELECT company_name, company_id FROM registered_companies";
$res = $db->getData($sql);

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_id = $_POST['company_id'];
    redirect('pptList.php');
}




?>


<?php include('includes/templates/top_bar_admin.php'); ?>

<!-- to include multipe select picker  
 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<!-- end -->


<!-- <body> -->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1" id="content">

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
                                            <center>
                                                <p>
                                                    <?php
                                                    getMessage();
                                                    ?>
                                                </p>
                                            </center>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-2 col-xs-2">
                                                </div>
                                                <div class="col-md-8 col-xs-8">
                                                    <form name="myform" method="POST" action="pptList.php">
                                                        <label for="PPT date">Company &nbsp &nbsp</label>
                                                        <select name="company_id" id="dropdown" class="selectpicker" data-live-search="true" onchange="alpha(this.value)" required>
                                                            <option value=0>Select a Company Name</option>
                                                            <?php

                                                            for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) {

                                                                echo "<option value=" . $res['oDATA'][$i]['company_id'] . "  > " . $res['oDATA'][$i]['company_name'] . " </option>";
                                                            }
                                                            ?>
                                                        </select>

                                                        <p><span id="total"></span></p>

                                                        <script type="text/javascript">
                                                            function alpha(value) {

                                                                console.log(value);
                                                                var xmlhttp = new XMLHttpRequest();
                                                                xmlhttp.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        document.getElementById("total").innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                xmlhttp.open("GET", "tmp.php?q=" + value, true);
                                                                xmlhttp.send();

                                                            }
                                                        </script>






                                                        <!-- <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="company_id">
                                                                    <option selected>Choose...</option>
                                                                    <?php
                                                                    ?>
                                                                    <option value=<? php
                                                                                    ?> name=company ><?php
                                                                                                        ?></option>
                                                                    <?php

                                                                    ?>
                                                                </select> -->
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <!-- <label for="PPT date">Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label> -->
                                                        <!-- <input type="date" name="pptdate" id="pptdate"> -->
                                                        <br>
                                                        <br>
                                                        <br>



                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-4">
                                                            </div>
                                                            <div class="col-md-4 col-xs-4">
                                                                <button type="submit" class="btn btn-primary" name="submit" id="ppt_button">
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


                    </section>
                </div>
            </body>
        </div>
    </div>
</div>


