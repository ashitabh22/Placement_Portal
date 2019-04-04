<?php


require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

$q = $_REQUEST['q'];

$que1 = "SELECT * FROM all_jobs WHERE company_id = '" . $q . "' ";
$r = $db->getData($que1);

$que2 = "SELECT * FROM posted_jobs_B_P WHERE company_id = '" . $q . "' ";
$r1 = $db->getData($que2);

$value = $r1['NO_OF_ITEMS'];

?>


<button type="button" data-toggle="modal" data-target= <?php echo "#myModal" . $i ?>><?php echo($value);?></button>
																
<!-- Modal -->
<div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
	<div class="modal-dialog">

<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Details of Jobs</h4>
			</div>
			<div class="modal-body">
				<table class="table table-hover" id="modelTable">
					<tr>
						<th> Sr.</th>
						<th>Program</th>
						<th>Branch</th>
						<th>Job Title</th>
					</tr>
						
					<?php for($i=0; $i<$r1['NO_OF_ITEMS'];$i++) { ?>
						<tr>
							<td><?php echo $i+1 ?></td>
							<td>
								<?php 
							 		if($r1['oDATA'][$i]['program_code'] == 0) {echo 'B.Tech';}
							 		elseif($r1['oDATA'][$i]['program_code'] == 1) {echo 'M.Tech';}
							 		elseif($r1['oDATA'][$i]['program_code'] == 2) {echo 'Ph.D';}
							 	?>							 	
							 </td>
							<td>
								<?php 
							 		if($r1['oDATA'][$i]['branch_code'] == 0) {echo 'EECS';}
							 		elseif($r1['oDATA'][$i]['branch_code'] == 1) {echo 'ME';}
							 	?>							 	
							 </td>
							<td><?php echo $r['oDATA'][0]['job_title'] ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>                                                


