<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM " . REGISTERED_COMPANIES;
$res = $db->getData($sql);
if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	$company_id = $_POST['delete'];
	$del_query = "DELETE FROM " . REGISTERED_COMPANIES . " WHERE company_id = '" . $company_id . "'";

	if (mysql_query($del_query)) {
		redirect('viewRegisteredCompany.php');
	} else {
		die(mysql_error());
	}
}
?>

<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar.php'); ?>


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
                                            <h3 class="panel-title">Registered Companies</h3>
                                        </div>


                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Name" id="searchppt">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="ex1">
                                                <table class="table table-hover" id="stdlist">

                                                    <tr>
                                                        <th>Company Id</th>
                                                        <th>Company Name</th>
                                                        <th>Details</th>
                                                        <th></th>
                                                    </tr>

                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                    <tr>
                                                        <td><?php echo $res['oDATA'][$i]['company_id'] ?></td>
                                                        <td><?php echo $res['oDATA'][$i]['company_name'] ?></td>
                                                        <td>


                                                            <button type="button" data-toggle="modal" data-target=<?php echo "#myModal" . $i ?>>View</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Details</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table" id="stdlist">
                                                                                <tr>
                                                                                    <th> Sr.</th>
                                                                                    <th>Company Info.</th>
                                                                                    <th>Details</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>1.</td>
                                                                                    <td>Company Name</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['company_name'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2.</td>
                                                                                    <td>Email</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['email'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3.</td>
                                                                                    <td>Point of Contact</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['point_of_contact'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4.</td>
                                                                                    <td>Mobile</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['mobile'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5.</td>
                                                                                    <td>Address</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['address'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6.</td>
                                                                                    <td>Website</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['website'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7.</td>
                                                                                    <td>About</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['about'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8.</td>
                                                                                    <td>Designation</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['designation'] ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <form method="post">
                                                            <td>
                                                                <button type="submit" value="<?php echo $res['oDATA'][$i]['company_id'] ?>" name="delete">Delete</button>
                                                            </td>
                                                        </form>
                                                    </tr>






                                                    <?php 
																									} ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-7" ">
                              <button type=" submit" class="btn btn-primary" onclick="showRecord();">
                                                &nbsp; Print
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </body>
            </div>
            <div class="col-md-3">
                <!-- generated from related link file -->
                <h3 class='mytitle'>placement</h3>
                <ul class='mysidebar'>
                    <li class='active'><a href='index.php?pid=invi_letter_tnp' target='_self'> Placement Invitation</a></li>
                    <li class='active'><a href='index.php?pid=internship_procedure' target='_self'> Internship Procedure</a></li>
                    <li class='active'><a href='index.php?pid=placement_procedure' target='_self'> Placement Procedure</a></li>
                    <li class='active'><a href='index.php?pid=company_portal' target='_self'> Company Registration</a></li>
                    <li class='active'><a href='index.php?pid=placement_office' target='_self'> Placement Office</a></li>
                    <li class='active'><a href='' target=''></a></li>
                </ul>
                <h3 class="mytitle">Navigation</h3>
                <!--Tes-->
                <ul class="mysidebar">
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_department">Departments</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=institute_facility">Facilities</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_research">Research and Development</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_academic">Academics</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_administration">Administration</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=aca_admission">Admissions</a></li>
                </ul>
            </div>
        </div>
    </div>




</body>

<?php include('includes/templates/bottom_bar.php'); ?> 