 <?php
  require_once("includes/settings.php");
  require_once("includes/database.php");
  require_once("includes/functions/common.php");
  require_once("includes/classes/db.cls.php");
  require_once("includes/classes/sitedata.cls.php");
  require_once 'includes/library/dompdf/autoload.inc.php';

  $db = new SiteData();
  $sql = "SELECT * FROM posted_jobs";
  $res = mysql_query($sql);

  $columnHeader = '';
  $columnHeader = "company_id" . "\t" . "job_title" . "\t" . "job_description" . "\t" . "cgpa_requirements" . "\t" . "program" . "\t" . "branch" . "\t" . "application_period" . "\t" . "minimum_package_offered" . "\t" . "number_of_posts" . "\t";

  $setData = '';
  $setData = "<html><table border=1><tr><th>Company Id</th><th>job Title</th><th>job Description</th><th>CGPA</th><th>Program</th><th>Branch</th><th>Appliation Period</th><th>Min. Package Offered</th><th>No. of Post</th></tr>";
  while ($rec = mysql_fetch_row($res)) {
    $setData .= "<tr>";
    //$rowData = '';
    foreach ($rec as $key => $value) {
      $setData .= "<td>" . $value . "</td>";
      //$rowData .= $value;
    }
    $setData .= "</tr>";
    //$setData .= trim($rowData) . "\n";
  }
  $setData .= "</table></html>";

  use Dompdf\Dompdf;

  $dompdf = new Dompdf();
  $dompdf->loadHtml($setData);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $pdf = $dompdf->stream();
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename=file.pdf');
  // header("Content-type: application/pdf");
  // header("Content-Dispostion: attachment; filename = PostedJobs_export.pdf");
  // header("Content-Type: application/vnd.ms-excel");
  // header("Pragma: no-cache");
  // header("Expires: 0");

  // echo ucword        s($co lumnHeader) . "\n" . $setData . "\n "; 
  ?> 