<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();

$sql = "SELECT * FROM all_jobs";
$res = $db->getData($sql);
?>

<?php
if (isset($_POST['print']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

require("fpdf/fpdf.php");
$db = new SiteData();
$sql = "SELECT * FROM all_jobs";
$res = $db->getData($sql);

class mypdf extends FPDF{
	function header(){
		$this->Image('fpdf/logo.jpg', 10, 6);
		$this->SetFont('Arial','B',18);
		$this->Cell(276,5,'List of All Available Jobs', 0,0,'C');
		$this->Ln(25);
	}

	function footer() {
		$this->SetY(-15);
		$this->SetFont('Arial', '', 8);
		$this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');
	}

	function table() {
		$this->SetFont('Times','B','8');
		$this->Cell(10,10,'post_id',1,0,'C');
		$this->Cell(17,10,'company_id',1,0,'C');
		$this->Cell(20,10,'Company',1,0,'C');
		$this->Cell(16,10,'job_title',1,0,'C');
		$this->Cell(20,10,'job_description',1,0,'C');
		$this->Cell(10,10,'CGPA',1,0,'C');
		$this->Cell(12,10,'program',1,0,'C');
		$this->Cell(10,10,'branch',1,0,'C');
		$this->Cell(18,10,'min_package',1,0,'C');
		$this->Cell(12,10,'Posts',1,0,'C');
		$this->Cell(24,10,'application-period',1,0,'C');
		$this->Cell(16,10,'ppt_date',1,0,'C');
		$this->Cell(16,10,'test_date',1,0,'C');
		$this->Cell(19,10,'interview_date',1,0,'C');
		$this->Cell(22,10,'shortlisting_date',1,0,'C');
		$this->Cell(19,10,'academic_year',1,0,'C');
		$this->Ln();
	}

	function data_table($res) {
		$this->SetFont('Arial', '', 8);
		for ($i = 0; $i < ($res['NO_OF_ITEMS']); $i++) {
			$data = $res['oDATA'][$i];
			$this->Cell(10,10,$data['post_id'],1,0,'C');
			$this->Cell(17,10,$data['company_id'],1,0,'C');
			$this->Cell(20,10,$data['company_name'],1,0,'C');
			$this->Cell(16,10,$data['job_title'],1,0,'C');
			$this->Cell(20,10,$data['job_description'],1,0,'C');
			$this->Cell(10,10,$data['cgpa_requirement'],1,0,'C');
			$this->Cell(12,10,$data['program'],1,0,'C');
			$this->Cell(10,10,$data['branch'],1,0,'C');
			$this->Cell(18,10,$data['min_package_offered'],1,0,'C');
			$this->Cell(12,10,$data['number_of_posts'],1,0,'C');
			$this->Cell(24,10,$data['application_period'],1,0,'C');
			$this->Cell(16,10,$data['ppt_date'],1,0,'C');
			$this->Cell(16,10,$data['test_date'],1,0,'C');
			$this->Cell(19,10,$data['interview_date'],1,0,'C');
			$this->Cell(22,10,$data['shortlisting_date'],1,0,'C');
			$this->Cell(19,10,$data['academic_year'],1,0,'C');
			$this->Ln();
		}
	}
}

	$pdf = new mypdf();
	$pdf->AliasnbPages();
	$pdf->AddPage('L', 'A4', '0');
	$pdf->table();
	$pdf->data_table($res);
	$pdf->Output();



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
															<th>Company ID</th>
															<th>Company Name <button type="button" class="btn btn-default btn-xs">
																<span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
															</button></th>
															<th>Job Title <button type="button" class="btn btn-default btn-xs">
																<span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
															</button></th>
															<th>Details</th>
															
														</tr>
														<?php for($i = 0;$i < $res['NO_OF_ITEMS'] ;$i++){ ?>
														<tr>
															<td id="one"><?php echo $res['oDATA'][$i]['company_id']?></td>
															<td id="two">Need to fetch from registered_companies table</td>
															<td id="three"><?php echo $res['oDATA'][$i]['job_title']?></td>
															<td style="display:none"><?php echo $res['oDATA'][$i]['branch']?></td>

														
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
																						<td>Job Description</td>
																						<td><?php echo $res['oDATA'][$i]['job_description']?></td>
																					</tr>
																					<tr>
																						<td>2.</td>
																						<td>CGPA Requirement</td>
																						<td><?php echo $res['oDATA'][$i]['cgpa_requireatePDF()rement']?></td>
																					</tr>
																					<tr>
																						<td>3.</td>
																						<td>Program</td>
																						<td><?php echo $res['oDATA'][$i]['program']?></td>
																					</tr>
																					<tr>
																						<td>4.</td>
																						<td>Branch</td>
																						<td><?php echo $res['oDATA'][$i]['branch']?></td>
																					</tr>
																					<tr>
																						<td>5.</td>
																						<td>Application Period</td>
																						<td><?php echo $res['oDATA'][$i]['application_period']?></td>
																					</tr>
																					<tr>
																						<td>6.</td>
																						<td>Minimum Package Offered</td>
																						<td><?php echo $res['oDATA'][$i]['min_package_offered']?></td>
																					</tr>
																					<tr>
																						<td>7.</td>
																						<td>Number of Posts</td>
																						<td><?php echo $res['oDATA'][$i]['number_of_posts']?></td>
																					</tr>
																					<tr>
																						<td>8.</td>
																						<td>PPT Date</td>
																						<td><?php echo $res['oDATA'][$i]['ppt_date']?></td>
																					</tr>
																					<tr>
																						<td>9.</td>
																						<td>Test Date</td>
																						<td><?php echo $res['oDATA'][$i]['test_date']?></td>
																					</tr>
																					<tr>
																						<td>10.</td>
																						<td>Interview Date</td>
																						<td><?php echo $res['oDATA'][$i]['interview_date']?></td>
																					</tr>
																					<tr>
																						<td>11.</td>
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
