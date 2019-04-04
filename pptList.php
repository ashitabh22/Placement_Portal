<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$company_id = $_POST['company_id'];

$db = new SiteData();

$bnp="SELECT * FROM ".POSTED_JOBS_B_P.",".BRANCH.",".PROGRAM." WHERE company_id='$company_id'and program_code=p_code and branch_code=b_code";
$bnpr=$db->getData($bnp);
//pr($bnpr);

$cdate="SELECT CURDATE()";
$res3=$db->getData($cdate);
$sql2 = "SELECT * FROM ".ALL_JOBS."  WHERE company_id='$company_id'";
$res2 = $db->getData($sql2);


$sql4="SELECT * FROM ".PPT_LIST." WHERE company_id='$company_id'";
$res5 = $db->getData($sql4);

$program=array();
$branch=array();

for ($i = 0; $i < $bnpr['NO_OF_ITEMS']; $i++){
    array_push($program,$bnpr['oDATA'][$i]['p_name']);

    array_push($branch,$bnpr['oDATA'][$i]['b_name']);
}



// echo $program[0];


$list = array();
$ppt_date=$res2['oDATA'][0]['ppt_date'];

if($res5['NO_OF_ITEMS']==0){

for ($i = 0; $i < count($program); $i++) {
   
    $sql = "SELECT * FROM  ".PERSONAL_DETAILS." WHERE degree='$program[$i]' AND branch='$branch[$i]'";
    $res = $db->getData($sql);
    array_push($list, $res);

}
// pr($list);

}
else{
    $sql_table="SELECT * FROM ".PERSONAL_DETAILS." ,".PPT_LIST."  WHERE " .PERSONAL_DETAILS.".ldapid=".PPT_LIST.".ldapid AND company_id='$company_id'" ;
    $rest = $db->getData($sql_table);
    // pr($rest);

}

$sql3="SELECT company_name FROM ".REGISTERED_COMPANIES."  WHERE company_id='$company_id'";
$res4 = $db->getData($sql3);




if (isset($_POST['new_update']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdate= $_POST['ppt_date'];
    $cid=$_POST['company_id'];
    
    if($res5['NO_OF_ITEMS']!=0){
        for ($i = 0; $i < $rest['NO_OF_ITEMS']; $i++){
            if($_POST['attendance_'.$i]){
                    $cvalue = "1";
                }else{
                    $cvalue = "0";
                }
            $ldap_id = $_POST['roll_number'.$i];    
            $query2 = "UPDATE ".PPT_LIST." SET attendance = '$cvalue' WHERE ldapid = '$ldap_id'";
           mysql_query($query2);
           
           
        }
    }else{
        $k = intval(0);
        for ($i = 0; $i < count($list); $i++) { 
            for ($j = 0; $j < $list[$i]['NO_OF_ITEMS']; $j++) { 
                $k++;
                if($_POST['attendance_'.$k]){
                    $cvalue = "1";
                }else{
                    $cvalue = "0";
                }
           
            // $ppt_date=$res2['oDATA'][0]['ppt_date'];
            $ldap_id = $_POST['roll_number'.$k]; 
            echo $ldap_id;
            echo $ppt_date;
            
            //echo "yha aaya";
           // die();
            //echo $ldap_id;
            //echo $cid;
            $query1="INSERT INTO ".PPT_LIST." VALUES('$ldap_id','$pdate','$cid','$cvalue')"; 
            mysql_query($query1);
            
            
            }
        }
    }

   redirect('ppt.php');
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
                                                             <?php //for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?>  
                                                            <th> <input type="hidden" value = <?php echo $company_id ?> name ='company_id' >
                                                            <input type="hidden" value = <?php echo $ppt_date ?> name ='ppt_date' >
                                                             <?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                   echo $res4['oDATA'][0]['company_name'];      
       
                                                                //echo $cname[0] ?></th> 
                                                                <?php 
												                //} ?>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                    
                                                        <tr>
                                                            <th>#</th>
                                                            <th></th>
                                                            <?php //for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?> 
                                                            <th><?php //$cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                      echo $res2['oDATA'][0]['ppt_date'];              
                                                                //echo $cname[1] ?></th>
                                                                <?php 
												                //} ?>
                                                            
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                    
                                                    <?php
                                                    if($res5['NO_OF_ITEMS']==0){
                                                        $k = intval(0);
                                                     for ($i = 0; $i < count($list); $i++) { ?>
                                                                <?php for ($j = 0; $j < $list[$i]['NO_OF_ITEMS']; $j++) { 
                                                                    $k++;?>
                                                            <tr>
                                                            
                                                                        <td><?php echo $list[$i]['oDATA'][$j]['name']; ?></td>
                                                                        <td> <input name=<?php echo"roll_number".$k?> value="<?php echo $list[$i]['oDATA'][$j]['ldapid'] ?>" type="text" style="display: none;">  <?php echo $list[$i]['oDATA'][$j]['roll_number'] ?></td>
                                                                
                                                                
                                                                <td><input type="checkbox" 
                                                                <?php 
                                                                    // if($res2['oDATA'][$j]['ppt_date']==$res5['oDATA'][$i]['ppt_date']){
                                                                    //     if ($res5['oDATA'][$i]['attendance'] == '1'){
                                                                    //         echo  "checked";
                                                                    //     }
                                                                    // }
                                                                ?> name=<?php echo "attendance_".$k ?>
                                                                <?php //$cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
                                                                //if ($res2['oDATA'][$j]['ppt_date'] != $res3['oDATA'][0]['CURDATE()']) echo  "disabled"   //Checking the current date ?> >
                                                                
                                                        </tr>
                                                        <?php 
												               } }}else{ ?>
                                                               <?php
                                                    
                                                            for ($i = 0; $i < $rest['NO_OF_ITEMS']; $i++) { ?>
                                                                
                                                            <tr>
                                                            
                                                                        <td><?php echo $rest['oDATA'][$i]['name'] ?></td>
                                                                        <td> <input name=<?php echo"roll_number".$i ?> value="<?php echo $rest['oDATA'][$i]['ldapid'] ?>" type="text" style="display: none;">  <?php echo $rest['oDATA'][$i]['roll_number'] ?></td>
                                                                
                                                                
                                                                <td><input type="checkbox" 
                                                                <?php 
                                                                    // if($res['oDATA'][$i]['ppt_date']==$res5['oDATA'][$i]['ppt_date']){
                                                                         if ($rest['oDATA'][$i]['attendance'] == '1'){
                                                                           echo  "checked";
                                                                       }
                                                                    // }
                                                                ?> name=<?php echo "attendance_".$i ?>
                                                                <?php //$cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
                                                                if ($rest['oDATA'][$i]['ppt_date'] != $res3['oDATA'][0]['CURDATE()']) echo  "disabled"   //Checking the current date ?> >
                                                                
                                                        </tr>
                                                        <?php 
												               } } ?>


                                                        
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
                    
                           
                