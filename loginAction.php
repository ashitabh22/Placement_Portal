<?php

session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();
if ($_POST) {
    $msg = "";
    $user = $_REQUEST['username']; // username
    //assign it to session variable
    if (!isset($_POST['username']) || trim($_POST['username']) == '') {
        $msg = "Username Required";
        setMessage('danger', $msg);
        redirect('login.php');
    } else if (!isset($_POST['password']) || trim($_POST['password']) == '') {
        $msg = "Password Required";
        setMessage('danger', $msg);
        redirect('login.php');
    } else {
        $server = "ldap.iitbhilai.ac.in";
        $port = 389;
        $basedn = "dc=iitbhilai,dc=ac,dc=in";
        $user = clear($_POST['username']);

        $filter = "(|(uid=" . $user . ")" . "(mail=" . $user . "@*))";
        $server . " -p " . $port . " -b " . $basedn . " \"" .
                $filter . "\"</tt></p>";
        $ldapconn = ldap_connect($server, $port) or
                die("Could not connect to " . $server . ":" . $port . ".");
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        $ldapbind = ldap_bind($ldapconn) or die("Could not bind anonymously.");
        $result = ldap_search($ldapconn, $basedn, $filter) or die("Search error.");
        $entries = ldap_get_entries($ldapconn, $result);
        $binddn = $entries[0]["dn"];
        $ldapbind = ldap_bind($ldapconn, $binddn, $_POST['password']);
        $usr_email = $entries[0]['mail'][0];

        if ($ldapbind) {
            $sql = "SELECT * FROM " . ADMIN . " WHERE ldapid = '" . $entries[0]['employeenumber'][0] . "'";
            $res = $db->getData($sql);
            if ($res['NO_OF_ITEMS'] == 1) {
                $_SESSION[SES]['admin'] = $entries[0]['employeenumber'][0];
                $_SESSION[SES]['email'] = $usr_email;
                $_SESSION[SES]['uname'] = $entries[0]['cn'][0];
                redirect('admin.php');
            } else {
                $sql = "SELECT * FROM " . LOGIN . " WHERE ldapid = '" . $entries[0]['employeenumber'][0] . "'";
                $res = $db->getData($sql);
                if ($res['NO_OF_ITEMS'] == 0) {
                   // if (substr($entries[0]['employeenumber'][0], 0, 3) == '116' || ($entries[0]['employeenumber'][0] == '41800070')) {
                        $sql1 = "INSERT INTO " . LOGIN . "(ldapid) VALUES('" . $entries[0]['employeenumber'][0] . "')";
                        $res1 = $db->inserttoDB($sql1);
                        $_SESSION[SES]['user'] = $entries[0]['employeenumber'][0];
                        $_SESSION[SES]['email'] = $usr_email;
                        $_SESSION[SES]['uname'] = $entries[0]['cn'][0];
                        redirect('form.php');
//                    } else {
//                        $msg = "Only 2016 Batch Students can login";
//                        setMessage('danger', $msg);
//                        redirect('login.php');
//                    }
                } else {
                    //if (substr($entries[0]['employeenumber'][0], 0, 3) == '419' || ($entries[0]['employeenumber'][0] == '41800070')) {
                        $_SESSION[SES]['user'] = $entries[0]['employeenumber'][0];
                        $_SESSION[SES]['email'] = $usr_email;
                        $_SESSION[SES]['uname'] = $entries[0]['cn'][0];
                        redirect('form.php');
                        pr($entries[0]);
//                    } else {
//                        $msg = "Only 2016 Batch Students can login";
//                        setMessage('danger', $msg);
//                        redirect('login.php');
//                    }
                }
            }
        } else {
            $msg = "Invalid Credentials";
            setMessage('danger', $msg);
            redirect('login.php');
        }
    }
    ldap_close($ldapconn);
}
?>