<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$company_id = $_POST['company_id'];
//echo $company_id;
$db = new SiteData();
//$sql = "SELECT * FROM ".PPT_LIST." , ".PERSONAL_DETAILS." WHERE " .PERSONAL_DETAILS.".ldapid=".PPT_LIST.".ldapid";
$sql = "SELECT * FROM  ".PERSONAL_DETAILS."";


$cdate="SELECT CURDATE()";

$sql2 = "SELECT * FROM ".ALL_JOBS."  WHERE company_id=".$company_id;
$sql3="SELECT company_name FROM ".REGISTERED_COMPANIES."  WHERE company_id=".$company_id;
$sql4="SELECT * FROM ".PPT_LIST." WHERE company_id=".$company_id;
//$sql2 = "SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='placement' AND `TABLE_NAME`='ppt_list'";
$res = $db->getData($sql);

$res2 = $db->getData($sql2);
//pr($res2);
//die();
$res3 = $db->getData($cdate);
$res4 = $db->getData($sql3);
$res5 = $db->getData($sql4);
// print $res3['oDATA'][0]['CURDATE()'];
if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "if die ";
    die();
    for ($j = 0; $j < $res2['NO_OF_ITEMS']; $j++) {
        //$cname=$res2['oDATA'][$j]['COLUMN_NAME'];
        //$cname2=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
        if ( $res2['oDATA'][$j]['ppt_date']   != $res3['oDATA'][0]['CURDATE()']){
            continue;
        }
        $ppt_date=$res2['oDATA'][$j]['ppt_date'] ;
        $comp_id=$res2['oDATA'][$j]['company_id'] ;
        echo $ppt_date;
        die();
        // echo $res['NO_OF_ITEMS'];
    for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) {
        $ldap_id = $_POST['roll_number'.$i];
       
        // if($_POST['attendence_'.$i]){
        //     $cvalue = "1";
        // }else{
        //     $cvalue = "0";
        // }
        echo $ldap_id;
        die();
        //echo $cvalue;
        //$query1="INSERT INTO ".PPT_LIST." VALUES($ldap_id,$ppt_date,$comp_id,0)";
        //$res5 = $db->getData($query1);
        //pr($res5);
        // die();
        //$query2 = "UPDATE ".PPT_LIST." SET attendance = '".$cvalue."' WHERE ldapid = '".$ldap_id."' ";
        // mysql_query($query1);
        // if (mysql_query($query)) {
        //     // redirect('pptList.php');
        // } else {
        //     die(mysql_error());
        // }
    }
    }
    redirect('pptList.php');

  
}
?>



<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_admin.php'); ?>

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
                                                    <input type="text" placeholder="Search by Name" id="searchppt">
                                                </div>
                                                <div class="col-md-5 col-xs-6 col-sm-5">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="PPT date"> &nbsp &nbsp &nbsp filter branch wise &nbsp &nbsp </label>
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option selected>Sort Branch Wise</option>
                                                                <option value="1">B.Tech CSE</option>
                                                                <option value="2">B.Tech ME</option>
                                                                <option value="3">B.Tech EE</option>
                                                                <option value="1">M.Tech CSE</option>
                                                                <option value="2">M.Tech ME</option>
                                                                <option value="3">M.Tech EE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="ex1">
                                                <table class="table" id="stdlist">
                                                    
                                                    <thead>
                                                    
                                                        <tr>
                                                            <th>Name of Students</th>
                                                            <th>Roll Number</th>
                                                            <?php for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?> 
                                                            <th>
                                                             <?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                   echo $res4['oDATA'][$i]['company_name']."_".$res2['oDATA'][$i]['program']."_".$res2['oDATA'][$i]['branch']                
                                                                //echo $cname[0] ?></th> 
                                                                <?php 
												                } ?>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                    
                                                        <tr>
                                                            <th>#</th>
                                                            <th></th>
                                                            <?php for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?> 
                                                            <th><?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                      echo $res2['oDATA'][$i]['ppt_date']              
                                                                //echo $cname[1] ?></th>
                                                                <?php 
												                } ?>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                        
                                                            <tr>
                                                                <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                                <td> <input name=<?php echo"roll_number".$i ?> value="<?php echo $res['oDATA'][$i]['ldapid'] ?>" type="text" style="display: none;">  <?php echo $res['oDATA'][$i]['roll_number'] ?></td>
                                                                <?php for ($j = 0; $j < $res2['NO_OF_ITEMS']; $j++) { ?> 
                                                                <td><input type="checkbox" 
                                                                <?php 
                                                                    // if($res2['oDATA'][$j]['ppt_date']==$res5['oDATA'][$i]['ppt_date']){
                                                                    //     if ($res5['oDATA'][$i]['attendance'] == '1'){
                                                                    //         echo  "checked";
                                                                    //     }
                                                                    // }
                                                                ?> name=<?php echo "attendence_".$i ?>
                                                                <?php //$cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
                                                                if ($res2['oDATA'][$j]['ppt_date'] != $res3['oDATA'][0]['CURDATE()']) echo  "disabled"  ?> >
                                                                <?php 
                                                                    } ?>
                                                                </td>
                                                        </tr>
                                                        <?php 
												} ?>
                                                    </tbody>
                                                    

                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="save">
                                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    </form>
                    
                           
                