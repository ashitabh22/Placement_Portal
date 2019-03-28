<?php

session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();
$msg = "";
$submit_url = BASE_URL . "submitted.php";
$approved_url = BASE_URL . "admin.php";
if (isset($_POST['approved'])) {
    $sql = "UPDATE " . STUD_DETAILS . " SET status = 2 WHERE ldapid = '".$_POST['uldapid']."'";
    $res = $db->update($sql);
    $msg = "Form has been approved";
    setMessage('success', $msg);
    redirect($approved_url);
}
if (isset($_POST['rejected'])) {
    $sql = "UPDATE " . STUD_DETAILS . " SET status = 3 WHERE ldapid = '".$_POST['uldapid']."'";
    $res = $db->update($sql);
    $msg = "Form has been rejected";
    setMessage('danger', $msg);
    redirect($approved_url);
}
if ($_POST['save-data'] || $_POST['submit-data']) {
    $uid = $_POST['uldapid'];
    $sql = "SELECT status FROM " . STUD_DETAILS . " WHERE ldapid = '$uid'";
    $res = $db->getData($sql);
    if (is_loggedin()) {
        if ($res['oDATA'][0]['status'] == 1) {
            redirect($submit_url);
        }
    }
    $url = BASE_URL . "form.php";
    if (trim($_POST['usr_name']) == '') {
        $msg = "Name should not be left blank";
        setMessage('danger', $msg);
        redirect($url);
    } else if (preg_match("/([a-zA-Z ]*)/", trim($_POST['usr_name']))) {
        $usr_name = test_data($_POST['usr_name']);
    } else {
        $msg = "Invalid Name";
        setMessage('danger', $msg);
        redirect($url);
    }
    if (trim($_POST['usr_roll']) == $uid) {
        $usr_roll = $_POST['usr_roll'];
    } else {
        $msg = "Invalid roll number";
        setMessage('danger', $msg);
        redirect($url);
    }
    if (!empty($_POST['usr_dob'])) {
        $usr_dob = $_POST['usr_dob'];
    } else {
        $msg = "Date of Birth can't be left blank";
        setMessage('danger', $msg);
        redirect($url);
    }
    $usr_degree = test_data($_POST['usr_degree']);
    if (trim($_POST['usr_branch']) == '') {
        $msg = "Branch should not be left blank";
        setMessage('danger', $msg);
        redirect($url);
    } else if (preg_match("/([a-zA-Z ]*)/", trim($_POST['usr_branch']))) {
        $usr_branch = test_data($_POST['usr_branch']);
    } else {
        $msg = "Invalid Branch";
        setMessage('danger', $msg);
        redirect($url);
    }
    if (preg_match("/([0-9]{1})/", trim($_POST['usr_semester']))) {
        $usr_semester = test_data($_POST['usr_semester']);
    } else {
        $msg = "Invalid semester number";
        setMessage('danger', $msg);
        redirect($url);
    }
    if ($_FILES['usr_file']['name'] != '') {
        if($_FILES['usr_file']['size'] > 10000000000){
            $msg = "File size should not exceed 10MB";
            setMessage('danger', $msg);
            redirect($url);
        }else{
            $FileType = strtolower(pathinfo(basename($_FILES['usr_file']['name']), PATHINFO_EXTENSION));
            $destination = FILE_PATH . $uid . '.' . $FileType;
            if ($FileType == 'pdf' || $FileType == 'PDF') {
                move_uploaded_file($_FILES["usr_file"]["tmp_name"], $destination);
            } else {
                $msg = "Only .pdf and .PDF documents are allowed";
                setMessage('danger', $msg);
                redirect($url);
            }
        }
    }
    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_POST['usr_email'])) {
        $usr_email = $_POST['usr_email'];
    } else {
        $msg = "Invalid email address";
        setMessage('danger', $msg);
        redirect($url);
    }
    if (preg_match("/([0-9]{10})/", trim($_POST['usr_phno']))) {
        $usr_phno = $_POST['usr_phno'];
    } else {
        $msg = "Invalid phone number";
        setMessage('danger', $msg);
        redirect($url);
    }
    $usr_preaddr = test_data($_POST['usr_preaddr']);
    $usr_peraddr = test_data($_POST['usr_peraddr']);

    $sql = "SELECT * FROM " . STUD_DETAILS . " WHERE ldapid='$uid'";
    $data = $db->getData($sql);
    if ($data['NO_OF_ITEMS'] == 0) {
        $sql = "INSERT INTO " . STUD_DETAILS . "(ldapid, name, roll_number, dob, degree, branch, semester, email, phone, present_addr, permanent_addr, dream_company) VALUES((SELECT ldapid FROM " . LOGIN . " WHERE ldapid = '$uid'), '$usr_name', '$usr_roll', '$usr_dob', '$usr_degree', '$usr_branch', '$usr_semester', '$usr_email', '$usr_phno', '$usr_preaddr', '$usr_peraddr', '" . $_POST['dream_company'] . "')";
        $res = $db->inserttoDB($sql);
    } else {
        $sql = "UPDATE " . STUD_DETAILS . " SET name = '$usr_name', roll_number = '$usr_roll', dob = '$usr_dob', degree = '$usr_degree', branch = '$usr_branch', semester = '$usr_semester', email = '$usr_email', phone = '$usr_phno', present_addr = '$usr_preaddr', permanent_addr = '$usr_peraddr', dream_company = '" . $_POST['dream_company'] . "' WHERE ldapid = '$uid'";
        $res1 = $db->update($sql);
    }
    for ($i = 1; $i <= 6; $i++) {
        if (trim($_POST['slno' . $i]) != '') {
            $sql = "UPDATE " . ACAD_DETAILS . " SET exam = '" . $_POST['exam' . $i] . "', board = '" . $_POST['board' . $i] . "', year = '" . $_POST['year' . $i] . "', discipline = '" . $_POST['discipline' . $i] . "', marks = '" . $_POST['marks' . $i] . "' WHERE ldapid = '$uid' AND slno = ".$_POST['slno' . $i];
            $res = $db->update($sql);
        } else {
            if (trim($_POST['exam' . $i]) != '') {
                $sql = "INSERT INTO " . ACAD_DETAILS . "(ldapid, exam, board, year, discipline, marks) "
                        . "VALUES('$uid', '" . $_POST['exam' . $i] . "', '" . $_POST['board' . $i] . "', '" . $_POST['year' . $i] . "', '" . $_POST['discipline' . $i] . "', '" . $_POST['marks' . $i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['sk_skill']); $i++) {
        $count = $i + 1;
        if (trim($_POST['sk_slno'][$i]) != '') {
            $sql = "UPDATE " . TECH_SKILL . " SET skill_name = '" . $_POST['sk_skill'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['sk_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['sk_skill'][$i]) != '') {
                $sql = "INSERT INTO " . TECH_SKILL . "(ldapid, skill_name) VALUES('$uid', '" . $_POST['sk_skill'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['sa_name']); $i++) {
        $count = $i + 1;
        if (trim($_POST['sa_slno'][$i]) != '') {
            $sql = "UPDATE " . ACHIVE_DETAILS . " SET ldapid = '$uid', achievement = '" . $_POST['sa_name'][$i] . "', year = '" . $_POST['sa_year'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['sa_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['sa_name'][$i]) != '') {
                $sql = "INSERT INTO " . ACHIVE_DETAILS . "(ldapid, achievement, year) VALUES('$uid', '" . $_POST['sa_name'][$i] . "', '" . $_POST['sa_year'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['in_name']); $i++) {
        $count = $i + 1;
        if (trim($_POST['in_slno'][$i]) != '') {
            $sql = "UPDATE " . INTERN_DETAILS . " SET ldapid = '$uid', company = '" . $_POST['in_name'][$i] . "', duration = '" . $_POST['in_duration'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['in_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['in_name'][$i]) != '') {
                $sql = "INSERT INTO " . INTERN_DETAILS . "(ldapid, company, duration) VALUES('$uid', '" . $_POST['in_name'][$i] . "', '" . $_POST['in_duration'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['por_name']); $i++) {
        $count = $i + 1;
        if (trim($_POST['por_slno'][$i]) != '') {
            $sql = "UPDATE " . RESPONSIBILITY . " SET ldapid = '$uid', position_held = '" . $_POST['por_name'][$i] . "', period = '" . $_POST['por_duration'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['por_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['por_name'][$i]) != '') {
                $sql = "INSERT INTO " . RESPONSIBILITY . "(ldapid, position_held, period) VALUES('$uid', '" . $_POST['por_name'][$i] . "', '" . $_POST['por_duration'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['we_name']); $i++) {
        $count = $i + 1;
        if (trim($_POST['we_slno'][$i]) != '') {
            $sql = "UPDATE " . WORK_EXP . " SET ldapid = '$uid', company = '" . $_POST['we_name'][$i] . "', duration = '" . $_POST['we_duration'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['we_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['we_name'][$i]) != '') {
                $sql = "INSERT INTO " . WORK_EXP . "(ldapid, company, duration) VALUES('$uid', '" . $_POST['we_name'][$i] . "', '" . $_POST['we_duration'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['pr_name']); $i++) {
        $count = $i + 1;
        if (trim($_POST['pr_slno'][$i]) != '') {
            $sql = "UPDATE " . PROJECT_DETAILS . " SET ldapid = '$uid', title = '" . $_POST['pr_name'][$i] . "', duration = '" . $_POST['pr_duration'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['pr_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['pr_name'][$i]) != '') {
                $sql = "INSERT INTO " . PROJECT_DETAILS . "(ldapid, title, duration) VALUES('$uid', '" . $_POST['pr_name'][$i] . "', '" . $_POST['pr_duration'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    for ($i = 0; $i < sizeof($_POST['eca_activity']); $i++) {
        $count = $i + 1;
        if (trim($_POST['eca_slno'][$i]) != '') {
            $sql = "UPDATE " . EXTRA_CURR_ACTIVITY . " SET ldapid = '$uid', activity = '" . $_POST['eca_activity'][$i] . "' WHERE ldapid = '$uid' AND slno = '".$_POST['eca_slno'][$i]."' ";
            $res = $db->update($sql);
        } else {
            if (trim($_POST['eca_activity'][$i]) != '') {
                $sql = "INSERT INTO " . EXTRA_CURR_ACTIVITY . "(ldapid, activity) VALUES('$uid', '" . $_POST['eca_activity'][$i] . "')";
                $res = $db->inserttoDB($sql);
            }
        }
    }
    if (isset($_POST['submit-data'])) {
        if (trim($_POST['exam1']) != '') {
            $sql = "UPDATE " . STUD_DETAILS . " SET status = 1 WHERE ldapid = '$uid'";
            $res = $db->update($sql);
            $msg = "Form has been submitted successfully";
            setMessage('success', $msg);
            redirect($submit_url);
        } else {
            $msg = 'Please fill all the required details before submitting.';
            setMessage('danger', $msg);
            redirect($url);
        }
    }

    if (is_loggedin()) {
        $msg = 'Data has been updated';
        setMessage('success', $msg);
        redirect($url);
    } else {
        $msg = 'Data has been updated';
        setMessage('success', $msg);
        redirect($url . '?uid=' . base64_encode($_POST['uldapid']));
    }
}
?>