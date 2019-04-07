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

$post_id = $_POST['post_id'];




$query10 = "SELECT * from personal_details where ldapid =" . $ldapid;

$res10 = $db->getData($query10);
$status = $res10['oDATA'][0]['status'];

if ($status == 2) {

		$degree = $res10['oDATA'][0]['degree'];

		$branch = $res10['oDATA'][0]['branch'];

		$p_code_query = "SELECT * from  program where program_code = '$degree'";
		$res_p = $db->getData($p_code_query);
		$p_code = $res_p['oDATA'][0]['o_code'];



		$b_code_query = "SELECT * from branch where branch_name =  '$branch'";
		$res_b = $db->getData($b_code_query);
		$b_code = $res_b['oDATA'][0]['o_code'];



		$var11 = "SELECT * from all_jobs where program_code = '$p_code' AND branch_code = '$b_code' ";
		$res_11 = $db->getData($var11);


		for ($i = 0; $i < $res_11['NO_OF_ITEMS']; $i++) {
			$post_ids = $res_11['oDATA'][$i]['post_id'];

			$query = "select * from applicable_jobs where post_id = '$post_ids' and ldapid=" . $ldapid;

			if ($db->getData($query)['NO_OF_ITEMS'] == 0) {
				$status = 2;
				$query = "insert into applicable_jobs (ldapid, status, post_id) values ('$ldapid', '$status', '$post_ids')";
				mysql_query($query);
			}
		}
		//  $all_job_inf = "SELECT * from  all_jobs_B_P where post_id = '$post_ids'" ;
		//  $res_job = $db->getData($all_job_inf);
	}

$sql = "SELECT * FROM all_jobs, applicable_jobs WHERE  all_jobs.post_id=applicable_jobs.post_id and applicable_jobs.ldapid=" . $ldapid;
$res2 = $db->getData($sql);

if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$post_id = $_POST['submit_changes'];


	$status = 4;
	$query = "UPDATE  applicable_jobs SET status = '$status' WHERE ldapid = '$ldapid' and post_id = '$post_id'";
	if (mysql_query($query)) {
		redirect('applicableJobs.php');
	} else {
		die(mysql_error());
	}
}


?>
<?php include('includes/templates/top_bar_student.php'); ?>
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
											<h3 class="panel-title">Applicable Jobs</h3>
										</div>
										<div class="panel-body">
											<div class="row">
												&nbsp &nbsp &nbsp &nbsp &nbsp
												<div class="col-md-3 col-xs-6 col-sm-3">
													<input type="text" onkeyup="myFunction()" placeholder="Search by Name" id="searchppt">
												</div>
											</div>
											<br>
											<div class="ex1">
												<table class="table table-hover" id="stdlist">
													<form method="post">
														<tr>
															<th>company_name</th>
															<th>jobtitle</th>
															<th>status</th>
															<th>view</th>
															<th></th>
														</tr>
														<?php for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) { ?>
															<tr>
																<td id="one" value=<?php echo $res2['oDATA'][$i]['post_id']; ?> name="post_id"><?php
																																				$comp_id = $res2['oDATA'][$i]['company_id'];
																																				$reg_com = "SELECT * from " . registered_companies . "  where company_id =" . $comp_id;
																																				$res3 = $db->getData($reg_com);
																																				$comp_name = $res3['oDATA'][0]['company_name'];
																																				echo $comp_name
																																				?></td>
																<td id="one"><?php echo $res2['oDATA'][$i]['job_title'] ?></td>

																<td>
																	<?php
																	$hoverq = "SELECT * FROM applicable_jobs WHERE ldapid ='$ldapid' AND post_id=" . $res2['oDATA'][$i]['post_id'];
																	$hover = $db->getData($hoverq);

																	?>
																	<a href="#" onclick="alert('<?php echo ' Time-Stamp: ' . $hover['oDATA'][0]['time_stamp']; ?>')">
																		<?php
																		$status = $res2['oDATA'][$i]['status'];
																		$reg_sts = "SELECT * from  status  where code =" . $status;
																		$res4 = $db->getData($reg_sts);
																		echo $res4['oDATA'][0]['status_name'];
																		?>

																	</a>

																</td>

																<td id="one"> <button type="button" data-toggle="modal" data-target=<?php echo "#myModal" . $i ?>>View</button>

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
																							<td><?php echo $res2['oDATA'][$i]['company_id'] ?></td>
																</td>
															</tr>
															<tr>
																<td>2.</td>
																<td>Job Description</td>
																<td><?php echo $res2['oDATA'][$i]['job_description'] ?></td>
															</tr>
															<tr>
																<td>3.</td>
																<td>CGPA Requirement</td>
																<td><?php echo $res2['oDATA'][$i]['cgpa_requirement'] ?></td>
															</tr>
															<tr>
																<td>4.</td>
																<td><b>Application Period</b></td>
																<td></td>
															</tr>
															<tr>
																<td></td>
																<td>From</td>
																<td><?php echo $res2['oDATA'][$i]['application_period_from'] ?></td>
															</tr>
															<tr>
																<td></td>
																<td>To</td>
																<td><?php echo $res2['oDATA'][$i]['application_period_to'] ?></td>
															</tr>
															<tr>
																<td>5.</td>
																<td>Minimum Package Offered</td>
																<td><?php echo $res2['oDATA'][$i]['min_package_offered'] ?></td>
															</tr>
															<tr>
																<td>6.</td>
																<td>PPT Date</td>
																<td><?php echo $res2['oDATA'][$i]['ppt_date'] ?></td>
															</tr>
															<tr>
																<td>7.</td>
																<td>Test Date</td>
																<td><?php echo $res2['oDATA'][$i]['test_date'] ?></td>
															</tr>
															<tr>
																<td>8.</td>
																<td>Interview Date</td>
																<td><?php echo $res2['oDATA'][$i]['interview_date'] ?></td>
															</tr>
															<tr>
																<td>9.</td>
																<td>Shortlisting Date</td>
																<td><?php echo $res2['oDATA'][$i]['shortlisting_date'] ?></td>
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



									<td id="one">

										<button <?php if ($res2['oDATA'][$i]['status'] != '2') { ?> style="opacity: 0.3; " <?php   } ?> type="submit" value="<?php echo $res2['oDATA'][$i]['post_id'] ?>" name="submit_changes" <?php if ($res2['oDATA'][$i]['status'] != '2') { ?> disabled <?php   } ?>>apply</button>

									</td>


									</tr>
									</form>
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
<script>
	function myFunction() {

		var input, filter, table, tr, td1, td2, td3, td4, i, txtValue1, txtValue2, txtValue4;
		input = document.getElementById("searchppt");
		filter = input.value.toUpperCase();
		table = document.getElementById("stdlist");
		tr = table.getElementsByTagName("tr");

		for (i = 0; i < tr.length; i = i + 1) {
			if ((i - 1) % 13 == 0) {
				td1 = tr[i].getElementsByTagName("td")[0];
				td2 = tr[i].getElementsByTagName("td")[1];
				td4 = tr[i].getElementsByTagName("td")[2];
				console.log(td4);


				if (td1 || td2 || td4) {
					txtValue1 = td1.textContent || td1.innerText;
					txtValue2 = td2.textContent || td2.innerText;
					txtValue4 = td4.textContent || td4.innerText;




					if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}


	}
</script>




<?php include('includes/templates/footer2.php') ?>