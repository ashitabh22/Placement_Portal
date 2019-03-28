<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$yearList = array(
    '--select--' => "", '1970' => "1970", '1971' => "1971", '1972' => "1972", '1973' => "1973", '1974' => "1974", '1975' => "1975", '1976' => "1976", '1977' => "1977", '1978' => "1978", '1979' => "1979", '1980' => "1980", '1981' => "1981", '1982' => "1982", '1983' => "1983", '1984' => "1984", '1985' => "1985", '1986' => "1986", '1987' => "1987", '1988' => "1988", '1989' => "1989", '1990' => "1990", '1991' => "1991", '1992' => "1992", '1993' => "1993", '1994' => "1994", '1995' => "1995", '1996' => "1996", '1997' => "1997", '1998' => "1998", '1999' => "1999", '2000' => "2000", '2001' => "2001", '2002' => "2002", '2003' => "2003", '2004' => "2004", '2005' => "2005", '2006' => "2006", '2007' => "2007", '2008' => "2008", '2009' => "2009", '2010' => "2010", "2011" => "2011", "2012" => "2012", "2013" => "2013", "2014" => "2014", "2015" => "2015",
    "2016" => "2016", "2017" => "2017", "2018" => "2018", "2020" => "2020"
);

function pr($ar) {
    echo '<pre style="text-align:left;">';
    print_r($ar);
    echo '</pre>';
}

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function clear($data) {
    $data = strtolower($data);
    $data = strip_tags($data);
    $data = html_entity_decode($data);
    $data = urldecode($data);
    $data = preg_replace('/[^A-Za-z0-9_.]/', ' ', $data);
    $data = preg_replace('/ +/', ' ', $data);
    $data = trim($data);

    return $data;
}

function is_loggedin() {
    if (isset($_SESSION[SES]['user'])) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function is_admin() {
    if (isset($_SESSION[SES]['admin'])) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function redirect($page = "") {
    if ($page == "") {
        return FALSE;
    } else {
        header("Location: " . $page);
        exit;
    }
}

function currentURL() {
    $currentpageurl = $_SERVER['PHP_SELF'];
    if ($_SERVER['QUERY_STRING'])
        $currentpageurl .= '?' . $_SERVER['QUERY_STRING'];
    return $currentpageurl;
}

function inText($str) {
    $str = addslashes(strip_tags($str));
    return $str;
}

function outText($str) {
    $str = stripslashes($str);
    return $str;
}

function setMessage($type, $msg) {
    $_SESSION[SES]['msg'] = '<div class="alert alert-' . $type . '">' . $msg . '</div>';
}

function getMessage() {
    echo $_SESSION[SES]['msg'];
    unset($_SESSION[SES]['msg']);
}

function sendConfMail($tomail, $appno) {
    $mail = new PHPMailer(TRUE);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Mailer = 'smtp';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = '';
        $mail->Password = '';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('', '');     // Add a recipient
        $mail->addAddress($tomail); // Name is optional	    
        $mail->addReplyTo('', '');
        //Content
        $mail->isHTML(TRUE);    // Set email format to HTML
        $mail->Subject = '';
        $mail->Body = '';
        if ($mail->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (Exception $e) {
        return FALSE;
    }
}

?>
