<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db=new SiteData();

   if($_POST)
   {
       $msg = "";
       $user=$_REQUEST['username'];// username
   
    //assign it to session variable
    if(!isset($_POST['username']) || trim($_POST['username'])=='')
   	{
   		$msg = "Username Required";
      setMessage('danger', $msg);
      redirect('login.php');

   	}
   	else if(!isset($_POST['password']) || trim($_POST['password'])=='')
   	{
   		$msg = "Password Required";      
      setMessage('danger', $msg);
   	  redirect('login.php');
    }
   	else
	{ 		 $server = "ldap.iitbhilai.ac.in";
	         $port = 389;
	         $basedn ="dc=iitbhilai,dc=ac,dc=in";
   		 
   			$user = clear($_POST['username']);

   		   $filter = "(|(uid=" . $user . ")" . "(mail=" . $user ."@*))";
           $server . " -p " . $port . " -b " . $basedn . " \"" .
           $filter . "\"</tt></p>";
           $ldapconn = ldap_connect($server,$port) or
           die("Could not connect to " . $server . ":" . $port . ".");
   		   ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
           $ldapbind = ldap_bind($ldapconn) or die("Could not bind anonymously.");
           $result = ldap_search($ldapconn,$basedn,$filter) or die ("Search error.");
           $entries = ldap_get_entries($ldapconn, $result);
           $binddn = $entries[0]["dn"];
           $ldapbind = ldap_bind($ldapconn, $binddn, $_POST['password']); 
           $usr_email = $user.'@iitbhilai.ac.in';

           if ($ldapbind && ($user!='')) {
            $result = ldap_search($ldapconn, $basedn, $filter);
            if (FALSE !== $result) {
              $entries = ldap_get_entries($ldapconn, $result);
              if ($entries['count'] > 0){
                $odd = 0;
                foreach ($entries[0] AS $key => $value){  
                  if (0 === $odd%2)
                    $ldap_columns[] = $key;
                  $odd++;
                }
                if($entries[0]['gecos'][0]!='')
                {     
                  $myvalue = $entries[0]['gecos'][0]; 
                  $arr = explode(',',trim($myvalue));
                  $ldap_name= $arr[0];
                  $_SESSION[SES]['ldapname']= $ldap_name; 
                }
                else
                {
                  $myvalue = $entries[0]['cn'][0]; 
                  $arr = explode(',',trim($myvalue));
                  $ldap_name= $arr[0];
                  $_SESSION[SES]['ldapname']= $ldap_name; 
                }
                for ($i = 0; $i < $entries['count']; $i++){ 
                  foreach ($ldap_columns AS $col_name){ 
                    if (isset($entries[$i][$col_name])){  
                      $output = NULL;                   
                      $output = $entries[$i][$col_name][0]; 
                      if($output)
                      {
                        $sql = "SELECT * FROM ".LOGIN." WHERE email = '$usr_email'";
                        $res = $db->getData($sql);

                        if ($res['NO_OF_ITEMS'] == 0) {
                          $sql1 = "INSERT INTO ".LOGIN."(email) VALUES('$usr_email')";
                          $res1 = $db->inserttoDB($sql1);
                          $_SESSION[SES]['user'] = $res1['oDATA'][0]['uid'];
                          $_SESSION[SES]['email'] = $res1['oDATA'][0]['email'];
                          redirect('form.php');
                        }
                        else{
                          $_SESSION[SES]['user'] = $res['oDATA'][0]['uid'];
                          $_SESSION[SES]['email'] = $res['oDATA'][0]['email'];
                          redirect('form.php');
                        }
                      }
                      else
                      { 
                        array_push($alert_err,"Authentication failed");
                        echo "<script>window.location='login.php'</script>";
                      }
                    }
                  } 
                }
              }
            }
           }
           else{
           	$msg = "Invalid Credentials";
            setMessage('danger', $msg);
            redirect('login.php'); 
           }					
   						
        }
        ldap_close($ldapconn);
    }
   ?>