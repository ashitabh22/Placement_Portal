<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db=new SiteData();

$msg = "";
if ($_POST['save-data'] || $_POST['submit-data']) {
  $uid = $_SESSION[SES]['user'];
  $url= BASE_URL."form.php";
  if(trim($_POST['usr_name']) == ''){
    $msg = "Name should not be left blank";
    setMessage('danger', $msg);
    redirect($url);
  }else if(preg_match("/([a-zA-Z ]*)/", trim($_POST['usr_name']))){
    $usr_name = test_data($_POST['usr_name']);
  }else{
    $msg = "Invalid Name";
    setMessage('danger', $msg);
    redirect($url);
  }
  if(preg_match("/([0-9]{8})/", trim($_POST['usr_roll']))){
    $usr_roll = test_data($_POST['usr_roll']);
  }else{
    $msg = "Invalid roll number";
    setMessage('danger', $msg);
    redirect($url);
  }
  if(preg_match("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", trim($_POST['usr_dob']))){
    $usr_dob = test_data($_POST['usr_dob']);
  }else{
    $msg = "Invalid Date of Birth";
    setMessage('danger', $msg);
    redirect($url);
  }
  $usr_degree = test_data($_POST['usr_degree']);
  if(trim($_POST['usr_branch']) == ''){
    $msg = "Branch should not be left blank";
    setMessage('danger', $msg);
    redirect($url);
  }else if(preg_match("/([a-zA-Z ]*)/", trim($_POST['usr_branch']))){
    $usr_branch = test_data($_POST['usr_branch']);
  }else{
    $msg = "Invalid Branch";
    setMessage('danger', $msg);
    redirect($url);
  }
  if(preg_match("/([0-9]{1})/", trim($_POST['usr_semester']))){
    $usr_semester = test_data($_POST['usr_semester']);
  }else{
    $msg = "Invalid semester number";
    setMessage('danger', $msg);
    redirect($url);
  }
  if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_POST['usr_email'])) {
    $usr_email = $_POST['usr_email'];
  } else {
    $msg = "Invalid email address";
    setMessage('danger', $msg);
    redirect($url);
  }
  if(preg_match("/([0-9]{10})/", trim($_POST['usr_phno']))){
    $usr_phno = $_POST['usr_phno'];

  }else{
    $msg = "Invalid phone number";
    setMessage('danger', $msg);
    redirect($url);
  }
  $usr_preaddr = test_data($_POST['usr_preaddr']);
  $usr_peraddr = test_data($_POST['usr_peraddr']);

  $sql = "SELECT * FROM ".STUD_DETAILS." WHERE ldapid='$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    $sql = "INSERT INTO ".STUD_DETAILS."(ldapid, name, roll_number, dob, degree, branch, semester, email, phone, present_addr, permanent_addr, dream_company) VALUES((SELECT ldapid FROM ".LOGIN." WHERE ldapid = '$uid'), '$usr_name', '$usr_roll', '$usr_dob', '$usr_degree', '$usr_branch', '$usr_semester', '$usr_email', '$usr_phno', '$usr_preaddr', '$usr_peraddr', '".$_POST['dream_company']."')";
    $res = $db->inserttoDB($sql);
  }else{
    $sql = "UPDATE ".STUD_DETAILS." SET name = '$usr_name', roll_number = '$usr_roll', dob = '$usr_dob', degree = '$usr_degree', branch = '$usr_branch', semester = '$usr_semester', email = '$usr_email', phone = '$usr_phno', present_addr = '$usr_preaddr', permanent_addr = '$usr_peraddr', dream_company = '".$_POST['dream_company']."' WHERE ldapid = '$uid'";
      $res1 = $db->update($sql);
  }

  $sql = "SELECT * FROM ".ACAD_DETAILS." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);

  if ($data['NO_OF_ITEMS'] == 0) {
  
    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(1, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam1']."', '".$_POST['board1']."', '".$_POST['year1']."', '".$_POST['discipline1']."', '".$_POST['marks1']."')";
    $res = $db->inserttoDB($sql);

    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(2, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam2']."', '".$_POST['board2']."', '".$_POST['year2']."', '".$_POST['discipline2']."', '".$_POST['marks2']."')";
    $res = $db->inserttoDB($sql);

    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(3, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam3']."', '".$_POST['board3']."', '".$_POST['year3']."', '".$_POST['discipline3']."', '".$_POST['marks3']."')";
    $res = $db->inserttoDB($sql);

    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(4, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam4']."', '".$_POST['board4']."', '".$_POST['year4']."', '".$_POST['discipline4']."', '".$_POST['marks4']."')";
    $res = $db->inserttoDB($sql);

    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(5, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam5']."', '".$_POST['board5']."', '".$_POST['year5']."', '".$_POST['discipline5']."', '".$_POST['marks5']."')";
    $res = $db->inserttoDB($sql);

    $sql = "INSERT INTO ".ACAD_DETAILS."(slno, ldapid, exam, board, year, discipline, marks) VALUES(6, (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = $uid), '".$_POST['exam6']."', '".$_POST['board6']."', '".$_POST['year6']."', '".$_POST['discipline6']."', '".$_POST['marks6']."')";
    $res = $db->inserttoDB($sql);

}else{
    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam1']."', board = '".$_POST['board1']."', year = '".$_POST['year1']."', discipline = '".$_POST['discipline1']."', marks = '".$_POST['marks1']."' WHERE ldapid = '$uid' AND slno = 1";
    $res = $db->update($sql);

    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam2']."', board = '".$_POST['board2']."', year = '".$_POST['year2']."', discipline = '".$_POST['discipline2']."', marks = '".$_POST['marks2']."' WHERE ldapid = '$uid' AND slno = 2";
    $res = $db->update($sql);

    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam3']."', board = '".$_POST['board3']."', year = '".$_POST['year3']."', discipline = '".$_POST['discipline3']."', marks = '".$_POST['marks3']."' WHERE ldapid = '$uid' AND slno = 3";
    $res = $db->update($sql);

    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam4']."', board = '".$_POST['board4']."', year = '".$_POST['year4']."', discipline = '".$_POST['discipline4']."', marks = '".$_POST['marks4']."' WHERE ldapid = '$uid' AND slno = 4";
    $res = $db->update($sql);

    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam5']."', board = '".$_POST['board5']."', year = '".$_POST['year5']."', discipline = '".$_POST['discipline5']."', marks = '".$_POST['marks5']."' WHERE ldapid = '$uid' AND slno = 5";
    $res = $db->update($sql);

    $sql = "UPDATE ".ACAD_DETAILS." SET exam = '".$_POST['exam6']."', board = '".$_POST['board6']."', year = '".$_POST['year6']."', discipline = '".$_POST['discipline6']."', marks = '".$_POST['marks6']."' WHERE ldapid = '$uid' AND slno = 6";
    $res = $db->update($sql);
}

  $sql = "SELECT * FROM ".TECH_SKILL." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['sk_skill']); $i++) {
      $sql = "INSERT INTO ".TECH_SKILL."(slno, ldapid, skill_name) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['sk_skill'][$i]."')";
      $res = $db->inserttoDB($sql);
    }
  }else{
    for ($i=0; $i < sizeof($_POST['sk_skill']); $i++){
      $sql = "UPDATE ".TECH_SKILL." SET skill_name = '".$_POST['sk_skill'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->update($sql);
    }
  }

  $sql = "SELECT * FROM ".ACHIVE_DETAILS." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    
    for ($i=0; $i < sizeof($_POST['sa_name']); $i++) {
      $sql = "INSERT INTO ".ACHIVE_DETAILS."(slno, ldapid, achievement, year) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['sa_name'][$i]."', '".$_POST['sa_year'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['sa_name']); $i++) {
      $sql = "UPDATE ".ACHIVE_DETAILS." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), achievement = '".$_POST['sa_name'][$i]."', year = '".$_POST['sa_year'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql); 
    }
  }

  $sql = "SELECT * FROM ".INTERN_DETAILS." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['in_name']); $i++) {
      $sql = "INSERT INTO ".INTERN_DETAILS."(slno, ldapid, company, duration) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['in_name'][$i]."', '".$_POST['in_duration'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['in_name']); $i++) {
      $sql = "UPDATE ".INTERN_DETAILS." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), company = '".$_POST['in_name'][$i]."', duration = '".$_POST['in_duration'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql); 
    }
  }

  $sql = "SELECT * FROM ".RESPONSIBILITY." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['por_name']); $i++) {
      $sql = "INSERT INTO ".RESPONSIBILITY."(slno, ldapid, position_held, period) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['por_name'][$i]."', '".$_POST['por_duration'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['por_name']); $i++) {
      $sql = "UPDATE ".RESPONSIBILITY." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), position_held = '".$_POST['por_name'][$i]."', period = '".$_POST['por_duration'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql); 
    }
  }

  $sql = "SELECT * FROM ".WORK_EXP." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['we_name']); $i++) {
      $sql = "INSERT INTO ".WORK_EXP."(slno, ldapid, company, duration) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['we_name'][$i]."', '".$_POST['we_duration'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['we_name']); $i++) {
      $sql = "UPDATE ".WORK_EXP." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), company = '".$_POST['we_name'][$i]."', duration = '".$_POST['we_duration'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql);
    }
  }

  $sql = "SELECT * FROM ".PROJECT_DETAILS." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['pr_name']); $i++) {
      $sql = "INSERT INTO ".PROJECT_DETAILS."(slno, ldapid, title, duration) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['pr_name'][$i]."', '".$_POST['pr_duration'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['pr_name']); $i++) {
      $sql = "UPDATE ".PROJECT_DETAILS." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), title = '".$_POST['pr_name'][$i]."', duration = '".$_POST['pr_duration'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql);
    }
  }

  $sql = "SELECT * FROM ".EXTRA_CURR_ACTIVITY." WHERE ldapid = '$uid'";
  $data = $db->getData($sql);
  if ($data['NO_OF_ITEMS'] == 0) {
    for ($i=0; $i < sizeof($_POST['eca_activity']); $i++) {
      $sql = "INSERT INTO ".EXTRA_CURR_ACTIVITY."(slno, ldapid, activity) VALUES('$i', (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), '".$_POST['eca_activity'][$i]."')";
      $res = $db->inserttoDB($sql); 
    }
  }else{
    for ($i=0; $i < sizeof($_POST['eca_activity']); $i++) {
      $sql = "UPDATE ".EXTRA_CURR_ACTIVITY." SET ldapid = (SELECT ldapid FROM ".STUD_DETAILS." WHERE ldapid = '$uid'), activity = '".$_POST['eca_activity'][$i]."' WHERE ldapid = '$uid' AND slno = '$i'";
      $res = $db->inserttoDB($sql);
    }
  }

  $msg = 'Data has been updated';
  setMessage('success', $msg);
  redirect($url);

}

?>