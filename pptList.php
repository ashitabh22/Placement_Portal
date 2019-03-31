<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM ".PPT_LIST." , ".PERSONAL_DETAILS." WHERE " .PERSONAL_DETAILS.".ldapid=".PPT_LIST.".ldapid";
$res = $db->getData($sql);
$cdate="SELECT CURDATE()";
$res3 = $db->getData($cdate);

$sql2 = "SELECT * FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='placement' AND `TABLE_NAME`='ppt_list'";
$res2 = $db->getData($sql2);
$res3 = $db->getData($cdate);
// print $res3['oDATA'][0]['CURDATE()'];
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
                                                            <?php for ($i = 1; $i < $res2['NO_OF_ITEMS']; $i++) { ?> 
                                                            <th><?php $cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                                   
                                                                echo $cname[0] ?></th>
                                                            <?php 
												                } ?>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                    
                                                        <tr>
                                                            <th>#</th>
                                                            <?php for ($i = 1; $i < $res2['NO_OF_ITEMS']; $i++) { ?> 
                                                            <th><?php $cname=(explode("_",$res2['oDATA'][$i]['COLUMN_NAME']));
                                                                                   
                                                                echo $cname[1] ?></th>
                                                            <?php 
												                } ?>
                                                        </tr>
                                                       
                                                    </thead>
                                                    <tbody>
                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                        <tr>
                                                            <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                            <?php for ($j = 1; $j < $res2['NO_OF_ITEMS']; $j++) { 
                                                                ?> 
                                                            <td><input type="checkbox" <?php if ($res['oDATA'][$i][$res2['oDATA'][$j]['COLUMN_NAME']] == '1') echo  "checked"  ?> value="<?php echo $res['oDATA'][$i]['student'] ?>" name="attendence" 
                                                            <?php $cname=(explode("_",$res2['oDATA'][$j]['COLUMN_NAME']));
                                                            if ($cname[1] == $res3['oDATA'][0]['CURDATE()']) echo  "disabled"  ?> >
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
                                            <div class="col-sm-7" ">
																<button type=" submit" class="btn btn-primary" onclick="showRecord();">
                                                Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                