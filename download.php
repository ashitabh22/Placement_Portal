<?php

session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once 'includes/library/dompdf/autoload.inc.php';
$db = new SiteData();


if (isset($_GET['uid'])) {
    
    $uid = base64_decode($_GET['uid']);
}

$sql = "SELECT * FROM " . STUD_DETAILS . " WHERE ldapid = '$uid'";
$personal_details = $db->getData($sql);
$sql = "SELECT * FROM " . ACAD_DETAILS . " WHERE ldapid = '$uid'";
$academic_details = $db->getData($sql);
$sql = "SELECT * FROM " . TECH_SKILL . " WHERE ldapid = '$uid'";
$tech_skill = $db->getData($sql);
$sql = "SELECT * FROM " . ACHIVE_DETAILS . " WHERE ldapid = '$uid'";
$achiev_details = $db->getData($sql);
$sql = "SELECT * FROM " . INTERN_DETAILS . " WHERE ldapid = '$uid'";
$intern_details = $db->getData($sql);
$sql = "SELECT * FROM " . RESPONSIBILITY . " WHERE ldapid = '$uid'";
$responsibility = $db->getData($sql);
$sql = "SELECT * FROM " . EXTRA_CURR_ACTIVITY . " WHERE ldapid = '$uid'";
$extra_curr_activity = $db->getData($sql);
$sql = "SELECT * FROM " . PROJECT_DETAILS . " WHERE ldapid = '$uid'";
$proj_details = $db->getData($sql);
$sql = "SELECT * FROM " . WORK_EXP . " WHERE ldapid = '$uid'";
$work_exp = $db->getData($sql);
?>

<?php

$html = "";
$html .= "<html><head>
        <style>
            @page { margin: 20px 60px; }
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size:20px;
                font-stretch:expanded;
                line-height:25px;
            }
            table td
            {
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        <hr><table align='left' border='0' width='100%'>
            <tr>
                <td align='left' width='80%'> <div style='font-size:26px;'>Indian Institute of Technology Bhilai</div>
                    <div style='font-size:24px;'>Student Details</div>
                </td>
                <td width='20%' align='right'><img src='images/logo_iitbh.jpg' width='50px'></td>
            </tr>
            <tr><td  colspan='3'><hr></td></tr>
        </table><br><br>
        <table width='100%' border='1' align='center' cellpadding='5' cellspacing='0'>
        </table><br><div align='left'><strong> 1. Personal information</strong></div><table width='100%' border='1' align='center' cellpadding='5' cellspacing='0'>
            <tr>
                <td width='25%'  bgcolor='#D7D7D7'><div align='center'>Name (in full)</div></td>
                <td width='25%'  bgcolor='#D7D7D7'><div align='center'>Roll Number </div></td>
                <td width='25%'  bgcolor='#D7D7D7'><div align='center'>Degree</div></td>
            </tr>
            <tr>
                <td><div align='center'>".$personal_details['oDATA'][0]['name']."</div></td>
                <td><div align='center'>".$personal_details['oDATA'][0]['roll_number']."</div></td>
                <td><div align='center'>".$personal_details['oDATA'][0]['degree']."</div></td>
            </tr>
            <tr>
                <td  bgcolor='#D7D7D7'><div align='center'>Branch </div></td>
                <td bgcolor='#D7D7D7'><div align='center' >Semester </div></td>
                <td bgcolor='#D7D7D7'><div align='center' >Date of birth </div></td>
            </tr>
            <tr>
                <td><div align='center'>".$personal_details['oDATA'][0]['branch']."</div></td>
                <td><div align='center'>".$personal_details['oDATA'][0]['semester']."</div></td>
                <td><div align='center'>".$personal_details['oDATA'][0]['dob']."</div></td>
            </tr>
        </table><br><table width='100%' border = '0' cellpadding='5' cellspacing='0'><tr><td><div align='left'><strong>2. Contact details:</strong></div></td></tr></table>
        <table width='100%' border='1' align='center' cellpadding='5' cellspacing='0'>
            <tr>
                <td width='27%'  bgcolor='#D7D7D7'><div align='center'>Present address</div></td>
                <td colspan='2'  bgcolor='#D7D7D7'><div align='center'>Contact Details</div></td>
            </tr>
            <tr>
                <td rowspan='2' valign='top'><div align='left'>".$personal_details['oDATA'][0]['present_addr']."</div></td>
                <td width='20%'  bgcolor='#D7D7D7'>Mobile </td>
                <td width='26%'>".$personal_details['oDATA'][0]['phone']."</td>
            </tr>
            <tr>
                <td bgcolor='#D7D7D7'>Email </td>
                <td>".$personal_details['oDATA'][0]['email']."</td>
            </tr>
            <tr>
                <td width='27%' bgcolor='#D7D7D7'><div align='center'>Permanent address</div></td>
                <td rowspan='2' bgcolor='#D7D7D7'>Dream Company </td>
                <td rowspan='2'>".$personal_details['oDATA'][0]['dream_company']."</td>
            </tr>
            <tr>
                <td height='5%' valign='top'><div align='left'>".$personal_details['oDATA'][0]['permanent_addr']."</div></td>
            </tr>
        </table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>3. Educational qualifications (In chronological order):</strong></div></td></tr></table>
        <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
            <tr>
                <td width='20%' bgcolor='#D7D7D7'><div align='center'>Exam</div></td>
                <td width='20%' bgcolor='#D7D7D7'><div align='center'>Board</div></td>
                <td width='20%' bgcolor='#D7D7D7'><div align='center'>Year of Passing</div></td>
                <td width='20%' bgcolor='#D7D7D7'><div align='center'>Discipline</div></td>
                <td width='20%' bgcolor='#D7D7D7'><div align='center'>Marks/ CGPA/ GPA</div></td>
            </tr>";
            for ($i = 0; $i < $academic_details['NO_OF_ITEMS']; $i++){
                $html .= "<tr>
                            <td>".$academic_details['oDATA'][$i]['exam']."</td>
                            <td>".$academic_details['oDATA'][$i]['board']."</td>
                            <td>".$academic_details['oDATA'][$i]['year']."</td>
                            <td>".$academic_details['oDATA'][$i]['discipline']."</td>
                            <td>".$academic_details['oDATA'][$i]['marks']."</td>
                        </tr>";
            }        
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>4. Technical Skills :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'><tr><td bgcolor='#D7D7D7'>Skill</td>";
                    for ($i = 0; $i < $tech_skill['NO_OF_ITEMS']; $i++){
                        $html .= "<td>".$tech_skill['oDATA'][$i]['skill_name']."</td>";
                    }
                "</tr></table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>5. Scholastic Achievement :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                    <tr>
                        <td bgcolor='#D7D7D7'>Achievement</td>
                        <td bgcolor='#D7D7D7'>Year</td>
                    </tr>
                     ";
                    for ($i = 0; $i < $achiev_details['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$achiev_details['oDATA'][$i]['achievement']."</td><td>".$achiev_details['oDATA'][$i]['year']."</td></tr>";
                    }
                "</table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>6. Internship :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                    <tr>
                        <td bgcolor='#D7D7D7'>Company</td>
                        <td bgcolor='#D7D7D7'>Duration</td>
                    </tr>
                    ";
                    for ($i = 0; $i < $intern_details['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$intern_details['oDATA'][$i]['company']."</td><td>".$intern_details['oDATA'][$i]['duration']."</td></tr>";
                    }
                "</table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>7. Position of Responsibility :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                     <tr>
                        <td bgcolor='#D7D7D7'>Position Held</td>
                        <td bgcolor='#D7D7D7'>Period</td>
                    </tr>
                    ";
                    for ($i = 0; $i < $responsibility['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$responsibility['oDATA'][$i]['position_held']."</td><td>".$responsibility['oDATA'][$i]['period']."</td></tr>";
                    }
                "</table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>8. Work Experience :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                    <tr>
                        <td bgcolor='#D7D7D7'>Company</td>
                        <td bgcolor='#D7D7D7'>Duration</td>
                    </tr>";
                    for ($i = 0; $i < $work_exp['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$work_exp['oDATA'][$i]['company']."</td><td>".$work_exp['oDATA'][$i]['duration']."</td></tr>";
                    }
                "</table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>9. Projects :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                    <tr>
                        <td bgcolor='#D7D7D7'>Title</td>
                        <td bgcolor='#D7D7D7'>Duration</td>
                    </tr>";
                    for ($i = 0; $i < $proj_details['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$proj_details['oDATA'][$i]['title']."</td><td>".$proj_details['oDATA'][$i]['duration']."</td></tr>";
                    }
                "</table>";
                
        $html .= "</table><br><table width='100%' border = '0' cellpadding='3' cellspacing='0'><tr><td><div align='left'><strong>10. Extra curricular activities :</strong></div></td></tr></table>
                    <table width='100%' border='1' align='center' cellpadding='3' cellspacing='0'>
                    <tr>
                        <td bgcolor='#D7D7D7'>Activity</td>
                    </tr>";
                    for ($i = 0; $i < $extra_curr_activity['NO_OF_ITEMS']; $i++){
                        $html .= "<tr><td>".$extra_curr_activity['oDATA'][$i]['activity']."</td></tr>";
                    }
                "</table>
        </body>
</html>";

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$pdf = $dompdf->output();

if(file_exists(FILE_PATH.$uid.'.pdf')){
    file_put_contents(FILE_PATH.$uid.'_verified.pdf', $pdf);
    $files = array($uid.'.pdf', $uid.'_verified.pdf');
    $zip_name = $uid.".zip";
    $zip = new ZipArchive;
    $zip->open('./uploads/'.$zip_name, ZipArchive::CREATE);
    foreach ($files as $file) {
      $zip->addFile('uploads/'.$file);  
    }
    $zip->close();
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename='.$zip_name);
    //header("Location: ".FILE_PATH.$uid.'.zip');
    readfile(FILE_PATH.$zip_name);
    unlink(FILE_PATH.$uid.'_verified.pdf');unlink(FILE_PATH.$uid.'.zip');
    
}else{
    $dompdf->stream($html= $uid);
}
    
?>



    <?php include('includes/templates/footer2.php') ?>