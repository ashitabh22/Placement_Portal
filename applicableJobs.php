<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();
if (!is_loggedin()) {
redirect('new_login.php');
} else {
	$ldapid = $_SESSION[SES]['user'];
	$query = "SELECT * from " . PERSONAL_DETAILS . "  where ldapid=" . $ldapid;
	$res = $db->getData($query);
	$degree = $res['oDATA'][0]['degree'];
	$branch = $res['oDATA'][0]['branch'];
	$query = "SELECT * from " . ACAD_DETAILS . " where ldapid=" . $ldapid;
	$res = $db->getData($query);
	$cgpa = $res['oDATA'][0]['marks'];
}


$ldapid = 11640680;
$query1 = "SELECT * from " . applicable_jobs . "  where ldapid=" . $ldapid;
$res1 = $db->getData($query1);
$post_id = $res1['oDATA'][0]['post_id'];
$query2 = "SELECT * from " . all_jobs . "  where post_id=" . $post_id;
$res2 = $db->getData($query2);




$sql = "SELECT * FROM all_jobs INNER JOIN applicable_jobs WHERE applicable_jobs.ldapid=". $ldapid;
$res = $db->getData($sql);
if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
$post_id = $_POST['submit_changes'];
$has_applied = 1;
$query = "insert into " . APPLICABLE_JOBS . " (ldapid, has_applied, post_id) values ($ldapid, $has_applied, $post_id)";
mysql_query($query);
$status = 4;
$query = "insert into " . APPLIED_STUDENTS . " (ldapid, post_id, status) values ($ldapid, $post_id, $status)";
if (mysql_query($query)) {
redirect('applicableJobs.php');
} else {
die(mysql_error());
}
}
?>
<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_student.php'); ?>
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
											<h3 class="panel-title">Applicable Jobs</h3>
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
														<th>company_id</th>
														<th>jobtitle</th>
														<th>program</th>
														<th>branch</th>
													</tr>
													<?php for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?>
													<tr>
														<td id="one"><?php
																$comp_id = $res2['oDATA'][$i]['company_id'];
																$reg_com = "SELECT * from " . registered_companies . "  where company_id =" . $comp_id;
															$res3 = $db->getData($reg_com);
															$comp_name = $res3['oDATA'][0]['company_name'];
															echo $comp_name
														?></td>
														<td id="one"><?php echo $res2['oDATA'][$i]['job_title'] ?></td>
														<td id="one"><?php echo $res2['oDATA'][$i]['program'] ?></td>
														<td id="one"><?php echo $res2['oDATA'][$i]['branch'] ?></td>
														
														
														
														
													</tr>
													<?php
													} ?>
												</table>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-5"></div>
											<div class="col-sm-7">
												<button type="submit" class="btn btn-primary" onclick="showRecord();">
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
		</div>
	</div>
</body>