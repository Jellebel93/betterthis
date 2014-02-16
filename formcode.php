<?PHP
######################################################
#                                                    #
#                Forms To Go 3.2.4                   #
#             http://www.bebosoft.com/               #
#                                                    #
######################################################



DEFINE('kOptional', true);
DEFINE('kMandatory', false);




error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('track_errors', true);

function DoStripSlashes($FieldValue) 
{ 
 if ( get_magic_quotes_gpc() ) { 
  if (is_array($FieldValue) ) { 
   return array_map('DoStripSlashes', $FieldValue); 
  } else { 
   return stripslashes($FieldValue); 
  } 
 } else { 
  return $FieldValue; 
 } 
}

#----------
# FilterCChars:

function FilterCChars($TheString)
{
 return preg_replace('/[\x00-\x1F]/', '', $TheString);
}

#----------
# Validate: Email

function check_email($email, $optional)
{
 if ( (strlen($email) == 0) && ($optional === kOptional) ) {
  return true;
 } elseif ( eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email) ) {
  return true;
 } else {
  return false;
 }
}



if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
 $ClientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
 $ClientIP = $_SERVER['REMOTE_ADDR'];
}

$FTGfirstname = DoStripSlashes( $_REQUEST['firstname'] );
$FTGlastname = DoStripSlashes( $_REQUEST['lastname'] );
$FTGphone = DoStripSlashes( $_REQUEST['phone'] );
$FTGemail = DoStripSlashes( $_REQUEST['email'] );


# Fields Validations

$ValidationFailed = false;

if (!check_email($FTGemail, kMandatory)) {
 $ValidationFailed = true;
 $FTGemail_errmsg = 'Invalid Email Address';
 $ErrorList .= $FTGemail_errmsg . '<br/>';
}


# Include message in error page and dump it to the browser

if ($ValidationFailed === true) {

 $ErrorPage = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title>Untitled Document</title></head><body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background:transparent"><table width="100%" height="100%" border="0" cellspacing="1" cellpadding="0" ><tr><td height="45" valign="top"><font color="#E94E1B" size="2" face="Arial, Helvetica, sans-serif"><b>ERRORS FOUND </b></font></td></tr><tr><td valign="top"><font color="#E94E1B" size="2" face="Arial, Helvetica, sans-serif"><!--VALIDATIONERROR--><br><br>Kindly recheck your entries and try again.</font></td></tr></table></body></html>';


 $ErrorPage = str_replace('<!--VALIDATIONERROR-->', $ErrorList, $ErrorPage);
 $ErrorPage = str_replace('<!--FIELDVALUE:firstname-->', $FTGfirstname, $ErrorPage);
 $ErrorPage = str_replace('<!--FIELDVALUE:lastname-->', $FTGlastname, $ErrorPage);
 $ErrorPage = str_replace('<!--FIELDVALUE:phone-->', $FTGphone, $ErrorPage);
 $ErrorPage = str_replace('<!--FIELDVALUE:email-->', $FTGemail, $ErrorPage);
 $ErrorPage = str_replace('<!--ERRORMSG:email-->', $FTGemail_errmsg, $ErrorPage);
  

 echo $ErrorPage;
 exit;

}
# Email to Form Owner

$emailSubject = FilterCChars("Better This | GET GLUED");

$emailBody = "\n"
 . "First Name : $FTGfirstname\n"
 . "Last Name : $FTGlastname\n"
 . "Phone : $FTGphone\n"
 . "Email : $FTGemail\n"
 . "";
 $emailTo = 'hello@betterthis.tv';
  
 $emailFrom = FilterCChars("$FTGemail");
  
 $emailHeader = "From: $emailFrom\n"
  . "MIME-Version: 1.0\n"
  . "Content-type: text/plain; charset=\"ISO-8859-1\"\n"
  . "Content-transfer-encoding: 8bit\n";
  
 mail($emailTo, $emailSubject, $emailBody, $emailHeader);


# Include message in the success page and dump it to the browser

$SuccessPage = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title>Untitled Document</title></head><body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background:transparent"><table width="95%" border="0" cellspacing="1" cellpadding="0"><tr><td valign="top"><font color="#E94E1B" size="2" face="Arial, Helvetica, sans-serif"><b>Thank You</b></font></td></tr></table></body></html>';

$SuccessPage = str_replace('<!--FIELDVALUE:fullname-->', $FTGfullname, $SuccessPage);
$SuccessPage = str_replace('<!--FIELDVALUE:phone-->', $FTGphone, $SuccessPage);
$SuccessPage = str_replace('<!--FIELDVALUE:email-->', $FTGemail, $SuccessPage);
$SuccessPage = str_replace('<!--FIELDVALUE:country-->', $FTGcountry, $SuccessPage);
$SuccessPage = str_replace('<!--FIELDVALUE:comments-->', $FTGcomments, $SuccessPage);

echo $SuccessPage;
exit;
?>