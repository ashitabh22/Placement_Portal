<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();

$db = new SiteData();
$sql = "SELECT * FROM posted_jobs_B_P"; //, posted_jobs_B_P WHERE company_id=comp_id";
$res = $db->getData($sql);

$s = "SELECT * FROM applicable_jobs";
$status = 3;



if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	$post_id = $_POST['delete'];
	$del_query = "DELETE FROM posted_jobs_B_P WHERE post_id = '" . $post_id . "'";

	if (mysql_query($del_query)) {
		redirect('postedjobs.php');
	} else {
		die(mysql_error());
	}
}


?>

<?php include('includes/templates/top_bar_admin.php'); ?>

<!--header and top bar ends here-->

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
					<div class="wrapper">
						<div id="sub-header"></div>
						<section class="content-header">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">Posted Jobs</h3>
										</div>
										<div class="panel-body">
											<div class="row">
												&nbsp &nbsp &nbsp &nbsp &nbsp
												<div class="col-md-2 col-xs-6 col-sm-2">
													<input type="text" onkeyup="myFunction()" placeholder=" &nbsp &nbsp Search " id="searchcomp">
													<br>
													<br>
												</div>
												<div class="col-md-3 col-xs-6 col-sm-3">

												</div>
												<div class="col-md-3 col-xs-6 col-sm-3">



												</div>
												<br>
												<div class="ex1">
													<table class="table" id="myTable">
														<tr>

															<th>Company Name</th>
															<th>Job Title</th>
															<th>Program</th>
															<th>Branch</th>

															<th>Details</th>
															<th>Delete</th>
															<th>Edit</th>
															<th>View Applied Students</th>

														</tr>
														<?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
																<tr>
																	<td><?php
																	$q2 = "select * from posted_jobs_B_P where post_id=" . $res['oDATA'][$i]['post_id'];
																	$post_desc = $db->getData($q2);
																	// pr($post_desc); die();
																	$company_id = $post_desc['oDATA'][0]['company_id'];
																	//pr($company_id); die();
																	$pd = "SELECT * FROM posted_jobs_B_P WHERE company_id=" . $company_id;
																	$res2 = $db->getData($pd);

																	$q3 = "select * from registered_companies where company_id=" . intval($company_id);
																	$comp_info = $db->getData($q3);
																	//pr($comp_info); die();

																	echo $comp_info['oDATA'][0]['company_name'] ?>
																	</td>

																	<td><?php
																	$q4 = "select * from all_jobs where company_id=" . $company_id;
																	$comp_info2 = $db->getData($q4);
																	echo $comp_info2['oDATA'][0]['job_title'] ?>
																	</td>

																	<td>
																		<?php
																	// $q4 = "select * from all_jobs where company_id=" . $company_id;
																	//$comp_info2 = $db->getData($q4);
																	$program_code = $res['oDATA'][$i]['program_code'];
																	$q5 = "select * from program where p_code=" . $program_code;
																	$comp_info3 = $db->getData($q5);
																	//pr($comp_info); die();

																	echo $comp_info3['oDATA'][0]['p_name'] ?>

																	</td>

																	<td>
																		<?php
																	// $q5 = "select * from posted_jobs_B_P where company_id=" . $company_id;
																	// $comp_info3 = $db->getData($q5);
																	$branch_code = $res['oDATA'][$i]['branch_code'];
																	$q6 = "select * from branch where b_code=" . $branch_code;
																	$comp_info4 = $db->getData($q6);
																	//pr($comp_info); die();

																	echo $comp_info4['oDATA'][0]['b_name'] ?>
																	</td>


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
																																		<table class="table table-hover" id="modelTable">
																																			<tr>
																																				<th> Sr.</th>
																																				<th>Job Info.</th>
																																				<th>Details</th>
																																			</tr>
																																			<tr>
																																				<td>1.</td>
																																				<td>Company ID</td>
																																				<td><?php echo $res['oDATA'][$i]['company_id'] ?></td>

																															</tr>
																															<tr>
																																<td>2.</td>
																																<td>Job Description</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['job_description'] ?></td>
																															</tr>
																															<tr>
																																<td>3.</td>
																																<td>CGPA Requirement</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['cgpa_requirement'] ?></td>
																															</tr>
																															<tr>
																																<td>4.</td>
																																<td>Application Period</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['application_period'] ?></td>
																															</tr>
																															<tr>
																																<td>5.</td>
																																<td>Minimum Package Offered</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['min_package_offered'] ?></td>
																															</tr>
																															<tr>
																																<td>7.</td>
																																<td>PPT Date</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['ppt_date'] ?></td>
																															</tr>
																															<tr>
																																<td>8.</td>
																																<td>Test Date</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['test_date'] ?></td>
																															</tr>
																															<tr>
																																<td>9.</td>
																																<td>Interview Date</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['interview_date'] ?></td>
																															</tr>
																															<tr>
																																<td>10.</td>
																																<td>Shortlisting Date</td>
																																<td><?php echo $comp_info2['oDATA'][$i]['shortlisting_date'] ?></td>
																															</tr>

																														</table>
																													</div>
																													<div class="modal-footer">
																														<a href="AppliedStudents.php">
																															<button type="button" name="abc">View Applied Students</button>
																														</a>
																														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																													</div>
																												</div>
																											</div>
																										</div>
																									</td>

																									<td>
																										<form method="post" action="">
																											<button type="submit" value="<?php echo $res['oDATA'][$i]['post_id'] ?>" name="delete">Delete</button>
																															</form>
																														</td>

																														<td>
																															<form method="post" action="editJobs.php">

																																<button type="submit" value="<?php echo $res['oDATA'][$i]['post_id'] ?>" name="edit">Edit</button>
																															</form>
																														</td>
																														<td>
																															<button type="button" data-toggle="modal" data-target=<?php echo "#myModal1" . $i ?>>View Applied Students</button>

																															<!-- Modal -->
																															<div class="modal fade" id=<?php echo "myModal1" . $i ?> role="dialog">
																															<div class="modal-dialog">

																																<!-- Modal content-->
																																<div class="modal-content">
																																	<div class="modal-header">
																																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																																		<h4 class="modal-title">Details</h4>
																																	</div>
																																	<div class="modal-body">
																																		<table class="table table-hover" id="modelTable">
																																			<tr>
																																				<th> ldapid</th>
																																				<th>Name</th>
																																				<th>Branch</th>
																																				<th>Program</th>

																																			</tr>
																																			<?php
																															$post_id = $res2['oDATA'][$i]['post_id'];
																															$b_q = $res2['oDATA'][$i]['branch_code'];
																															$p_q = $res2['oDATA'][$i]['program_code'];
																															$q_ldap_id = "SELECT * FROM applicable_jobs WHERE post_id='" . $post_id . "' AND status >= 4";
																															$res_applied_stud = $db->getData($q_ldap_id);
																															for ($k = 0; $k < $res_applied_stud['NO_OF_ITEMS']; $k++) { ?>
																																<tr>
																																	<td><?php echo $res_applied_stud['oDATA'][$k]['ldapid'] ?></td>
																																<td><?php
																																$q_ldap_name = "select * from personal_details where ldapid = " . $res_applied_stud['oDATA'][$k]['ldapid'];
																																$res_ldap_name = $db->getData($q_ldap_name);
																																echo $res_ldap_name['oDATA'][0]['name'];
																																?></td>
																																<td><?php
																																echo $db->getData("select * from branch where b_code = " . $b_q)['oDATA'][0]['b_name'];
																																?></td>
																																<td><?php
																																echo $db->getData("select * from program where p_code = " . $b_q)['oDATA'][0]['p_name'];
																																?></td>
																																</tr>
																																									<?php
																															} ?>
																															</table>

																														</div>
																														<div class="modal-footer">

																															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																														</div>
																													</div>
																												</div>
																											</div>
																										</td>


																									</tr>

																																	<?php
																														} ?>

													</table>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-5"></div>
												<div class="col-sm-7" ">
														<form method=" post" action="">
													<button type="submit" class="btn btn-primary" name="print">
														&nbsp; Print
													</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
						</section>
					</div>
				</body>
			</div>
			<?php include('includes/templates/sidebar.php'); ?>
		</div>
	</div>
</body>
<!--footer section starts here-->
<script>
	function myFunction() {
		table = document.getElementById("newtable");
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("searchcomp");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");

		for (i = 0; i < tr.length; i = i + 1) {
			td1 = tr[i].getElementsByTagName("td")[0];
			td2 = tr[i].getElementsByTagName("td")[1];
			td5 = tr[i].getElementsByTagName("td")[2];
			if ((i - 1) % 13 == 0) {
				td3 = tr[i + 5].getElementsByTagName("td")[2];
				td4 = tr[i + 4].getElementsByTagName("td")[2];
			}

			console.log(td2);

			if (td1 || td2) {
				txtValue1 = td1.textContent || td1.innerText;
				txtValue2 = td2.textContent || td2.innerText;
				txtValue5 = td5.textContent || td5.innerText;

				if ((i - 1) % 13 == 0) {
					txtValue3 = td3.textContent || td3.innerText;
					txtValue4 = td4.textContent || td4.innerText;
					if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}


	}
</script>