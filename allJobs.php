<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();

$sql = "SELECT * FROM all_jobs INNER JOIN registered_companies WHERE registered_companies.company_id=all_jobs.company_id";
$res = $db->getData($sql);
?>

<?php include('includes/templates/top_bar_student.php'); ?>

<!--header and top bar ends here-->
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" id="content">
				<body id="content">
					<style type="text/css">
						.red{
							color: #f20000;
						}
						#webdet{
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
											<h3 class="panel-title">All Jobs</h3>
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
															
															<th>Company Name <button type="button" class="btn btn-default btn-xs">
																<span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
															</button></th>
															<th>Job Title <button type="button" class="btn btn-default btn-xs">
																<span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
															</button></th>
															<th>Program</th>
															<th>Branch</th>
															<th>Details</th>
															
														</tr>
														<?php for($i = 0;$i < $res['NO_OF_ITEMS'] ;$i++){ ?>
														<tr>
															<td id="one"><?php echo $res['oDATA'][$i]['company_name']?></td>
															<td id="two"><?php echo $res['oDATA'][$i]['job_title']?></td>
															<td id="three"><?php echo $res['oDATA'][$i]['program']?></td>
															<td id="four"><?php echo $res['oDATA'][$i]['branch']?></td>													
															<td>
																 <button type="button" data-toggle="modal" data-target= <?php echo "#myModal" . $i ?>>View</button>
																
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
																						<td><?php echo $res['oDATA'][$i]['company_id']?></td>
																						</td>
																					</tr>
																					<tr>
																						<td>2.</td>
																						<td>Job Description</td>
																						<td><?php echo $res['oDATA'][$i]['job_description']?></td>
																					</tr>
																					<tr>
																						<td>3.</td>
																						<td>CGPA Requirement</td>
																						<td><?php echo $res['oDATA'][$i]['cgpa_requirement']?></td>
																					</tr>				
																					<tr>
																						<td>4.</td>
																						<td>Application Period</td>
																						<td><?php echo $res['oDATA'][$i]['application_period']?></td>
																					</tr>
																					<tr>
																						<td>5.</td>
																						<td>Minimum Package Offered</td>
																						<td><?php echo $res['oDATA'][$i]['min_package_offered']?></td>
																					</tr>
																					<tr>
																						<td>6.</td>
																						<td>Number of Posts</td>
																						<td><?php echo $res['oDATA'][$i]['number_of_posts']?></td>
																					</tr>
																					<tr>
																						<td>7.</td>
																						<td>PPT Date</td>
																						<td><?php echo $res['oDATA'][$i]['ppt_date']?></td>
																					</tr>
																					<tr>
																						<td>8.</td>
																						<td>Test Date</td>
																						<td><?php echo $res['oDATA'][$i]['test_date']?></td>
																					</tr>
																					<tr>
																						<td>9.</td>
																						<td>Interview Date</td>
																						<td><?php echo $res['oDATA'][$i]['interview_date']?></td>
																					</tr>
																					<tr>
																						<td>10.</td>
																						<td>Shortlisting Date</td>
																						<td><?php echo $res['oDATA'][$i]['shortlisting_date']?></td>
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
															
														</tr>
														<?php } ?>
														
													</table></div>
												</div>
												<div class="form-group row">
													<div class="col-sm-5"></div>
													<div class="col-sm-7" ">
														<form method="post" action="">
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
						</body>			        </div>
						<?php include('includes/templates/sidebar.php'); ?>
					</div>
				</div>
				</body>			<!--footer section starts here-->
				<script>
				function myFunction() {
				table = document.getElementById("newtable");
				var input, filter, table, tr, td, i, txtValue;
				input = document.getElementById("searchcomp");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");
				
				for (i = 0; i < tr.length; i=i+1)
				{
				td1 = tr[i].getElementsByTagName("td")[0];
				td2 = tr[i].getElementsByTagName("td")[1];
				td5 = tr[i].getElementsByTagName("td")[2];
				if((i-1)%13==0)
				{
					td3 = tr[i+5].getElementsByTagName("td")[2];
					td4 = tr[i+4].getElementsByTagName("td")[2];
				}
				
				console.log(td2);
				
				if (td1||td2) {
				txtValue1 = td1.textContent || td1.innerText;
				txtValue2 = td2.textContent || td2.innerText;
				txtValue5 = td5.textContent || td5.innerText;
				
				if((i-1)%13==0)
				{
				txtValue3 = td3.textContent || td3.innerText;
				txtValue4 = td4.textContent || td4.innerText;
				if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1||txtValue3.toUpperCase().indexOf(filter) > -1 ||txtValue4.toUpperCase().indexOf(filter) > -1 ||txtValue5.toUpperCase().indexOf(filter) > -1 )  {
				tr[i].style.display = "";
				} else {
				tr[i].style.display = "none";
				}
				}
				}
				}
				
				
				}
				</script>
