<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$company_id = $_POST['company_id'];

$db = new SiteData();

$bnp = "SELECT * FROM " . ALL_JOBS . "," . BRANCH . "," . PROGRAM . " WHERE company_id='$company_id'and " . ALL_JOBS . ".program_code=" . PROGRAM . ".o_code and " . ALL_JOBS . ".branch_code=" . BRANCH . ".o_code";
$bnpr = $db->getData($bnp);
//pr($bnpr);

$cdate = "SELECT CURDATE()";
$res3 = $db->getData($cdate);
$sql2 = "SELECT * FROM " . ALL_JOBS . "  WHERE company_id='$company_id'";
$res2 = $db->getData($sql2);


$sql4 = "SELECT * FROM " . PPT_LIST . " WHERE company_id='$company_id'";
$res5 = $db->getData($sql4);

$program = array();
$branch = array();

for ($i = 0; $i < $bnpr['NO_OF_ITEMS']; $i++) {
    array_push($program, $bnpr['oDATA'][$i]['program_code']);

    array_push($branch, $bnpr['oDATA'][$i]['branch_name']);
}



// echo $program[0];


$list = array();
$ppt_date = $res2['oDATA'][0]['ppt_date'];

if ($res5['NO_OF_ITEMS'] == 0) {

    for ($i = 0; $i < count($program); $i++) {

        $sql = "SELECT * FROM  " . PERSONAL_DETAILS . " WHERE degree='$program[$i]' AND branch='$branch[$i]'";
        $res = $db->getData($sql);
        array_push($list, $res);
    }
    // pr($list);

} else {
    $sql_table = "SELECT * FROM " . PERSONAL_DETAILS . " ," . PPT_LIST . "  WHERE " . PERSONAL_DETAILS . ".ldapid=" . PPT_LIST . ".ldapid AND company_id='$company_id'";
    $rest = $db->getData($sql_table);
    // pr($rest);

}

$sql3 = "SELECT company_name FROM " . REGISTERED_COMPANIES . "  WHERE company_id='$company_id'";
$res4 = $db->getData($sql3);




if (isset($_POST['new_update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdate = $_POST['ppt_date'];
    $cid = $_POST['company_id'];

    if ($res5['NO_OF_ITEMS'] != 0) {
        for ($i = 0; $i < $rest['NO_OF_ITEMS']; $i++) {
            if ($_POST['attendance_' . $i]) {
                $cvalue = "1";
            } else {
                $cvalue = "0";
            }
            $ldap_id = $_POST['roll_number' . $i];
            $query2 = "UPDATE " . PPT_LIST . " SET attendance = '$cvalue' WHERE ldapid = '$ldap_id'";
            mysql_query($query2);
        }
    } else {
        $k = intval(0);
        for ($i = 0; $i < count($list); $i++) {
            for ($j = 0; $j < $list[$i]['NO_OF_ITEMS']; $j++) {
                $k++;
                if ($_POST['attendance_' . $k]) {
                    $cvalue = "1";
                } else {
                    $cvalue = "0";
                }

                // $ppt_date=$res2['oDATA'][0]['ppt_date'];
                $ldap_id = $_POST['roll_number' . $k];
                echo $ldap_id;
                echo $ppt_date;

                //echo "yha aaya";
                // die();
                //echo $ldap_id;
                //echo $cid;
                $query1 = "INSERT INTO " . PPT_LIST . " VALUES('$ldap_id','$cid','$cvalue')";
                mysql_query($query1);
            }
        }
    }

    redirect('ppt.php');
}



?>




<?php include('includes/templates/top_bar_admin.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="content">

                <body id="content">
                    <style type="text/css">
                        .red {
                            color: #f20000;
                        }

                        #webdet {
                            display: none;
                        }
                    </style>
                    <form method="post" action="">
                        <div class="wrapper">
                            <div id="sub-header"></div>
                            <section class="content-header">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Attendance list</h3>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">
                                                    &nbsp &nbsp &nbsp &nbsp &nbsp
                                                    <div class="col-md-3 col-xs-6 col-sm-3">
                                                         <input type="text" onkeyup="myFunction()" placeholder=" &nbsp &nbsp Search " id="searchcomp">
                                                    </div>


                                                </div>
                                                <br>
                                                <div class="ex1">
                                                    <table class="table" id="stdlist">

                                                        <thead>

                                                            <tr>
                                                                <th>Name of Students</th>
                                                                <th>Roll Number</th>
                                                                <?php
                                                                ?>
                                                                <th> <input type="hidden" value=<?php echo $company_id ?> name='company_id'>
                                                                    <input type="hidden" value=<?php echo $ppt_date ?> name='ppt_date'>
                                                                    <?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                                                echo $res4['oDATA'][0]['company_name'];


                                                                                                ?></th>
                                                                <?php

                                                                                                ?>

                                                            </tr>
                                                        </thead>
                                                        <thead>

                                                            <tr>
                                                                <th>#</th>
                                                                <th></th>
                                                                <?php
                                                                                                ?>
                                                                <th><?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                                                echo $res2['oDATA'][0]['ppt_date'];

                                                                                                ?></th>
                                                                <?php

                                                                                                ?>

                                                            </tr>

                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                                                                if ($res5['NO_OF_ITEMS'] == 0) {
                                                                                                    $k = intval(0);
                                                                                                    for ($i = 0; $i < count($list); $i++) { ?>
                                                                                                        <?php for ($j = 0; $j < $list[$i]['NO_OF_ITEMS']; $j++) {
                                                                                                            $k++; ?>
                                                                                                            <tr>

                                                                                                                <td><?php echo $list[$i]['oDATA'][$j]['name']; ?></td>
                                                                                                            <td> <input name=<?php echo "roll_number" . $k ?> value="<?php echo $list[$i]['oDATA'][$j]['ldapid'] ?>" type="text" style="display: none;"> <?php echo $list[$i]['oDATA'][$j]['roll_number'] ?></td>


                                                                                                                                                                                                                <td><input type="checkbox" <?php
                                                                                                                                                                                                                if ($res2['oDATA'][0]['ppt_date'] != $res3['oDATA'][0]['CURDATE()']) echo  "disabled" // if($res2['oDATA'][$j]['ppt_date']==$res5['oDATA'][$i]['ppt_date']){
                                                                                                                                                                                                                //     if ($res5['oDATA'][$i]['attendance'] == '1'){
                                                                                                                                                                                                                //         echo  "checked";
                                                                                                                                                                                                                //     }
                                                                                                                                                                                                                // }
                                                                                                                                                                                                                ?> name=<?php echo "attendance_" . $k ?> <?php //$cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));

                                                                                                                                                                                                                                                            ?>>

                                                                                                                                                                                                                                                            </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                } else { ?>
                                                                                                                                                                                                                                                    <?php

                                                                                                                                                                                                                                                    for ($i = 0; $i < $rest['NO_OF_ITEMS']; $i++) { ?>

                                                                                                                                                                                                                                                        <tr>

                                                                                                                                                                                                                                                            <td><?php echo $rest['oDATA'][$i]['name'] ?></td>
                                                                                                                                                                                                                                                        <td> <input name=<?php echo "roll_number" . $i ?> value="<?php echo $rest['oDATA'][$i]['ldapid'] ?>" type="text" style="display: none;"> <?php echo $rest['oDATA'][$i]['roll_number'] ?></td>


                                                                                                                                                                                                                                                        <td><input type="checkbox" <?php
                                                                                                                                                                                                                                                        // if($res['oDATA'][$i]['ppt_date']==$res5['oDATA'][$i]['ppt_date']){
                                                                                                                                                                                                                                                        if ($rest['oDATA'][$i]['attendance'] == '1') {
                                                                                                                                                                                                                                                            echo  "checked";
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        // }
                                                                                                                                                                                                                                                        ?> name=<?php echo "attendance_" . $i ?> <?php //$cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
                                                                                                                                                                                                                                                                                                    if ($rest['oDATA'][$i]['ppt_date'] != $res3['oDATA'][0]['CURDATE()']) echo  "disabled"
                                                                                                                                                                                                                                                                                                    ?>>

                                                                                                                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php
                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                            } ?>



                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="save">
                                                    <button type="submit" class="btn btn-primary" name="new_update">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                    <script>
                function myFunction() {
                table = document.getElementById("newtable");
                var input, filter, table, tr,  td1,td2,td3,td4, i, txtValue1,txtValue2, txtValue3 , txtValue4;
                input = document.getElementById("searchcomp");
                filter = input.value.toUpperCase();
                table = document.getElementById("stdlist");
                tr = table.getElementsByTagName("tr");
                
                for (i = 0; i < tr.length; i=i+1)
                {
                    
                td1 = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[1];
             
                if (td1||td2) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
              
                
                
                
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 )  {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
                }
                
                }
                
                
                }
                </script>