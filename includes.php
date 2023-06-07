<?php

function do_query($insert, $hresponse, $con) {
  $result = mysqli_query ($con,$insert);

  if ($result) {
    //Response to web browser
    echo '<table width="85%"><tr><td><em>Confirming input:<p></em></td></tr>';
    echo "<tr><td>$hresponse</td></tr></table>";
    } else {
    echo 'System error <br>';
    echo '<p>' . mysqli_error($con) . '<br> </p>';
  }
}

function mycaptcha(){
// this function can be called into request form to display a simple captcha in a table format
        $mysecurity = rand(5, 15998);
        $keytest = $mysecurity * 2 ;
        ?>
        <input name="keytest" value="<?php echo "$keytest"; ?>" type="hidden">
        <table width="75% border="0" align="center">
        <tr><td width="46%">&nbsp;</td>
            <td><b><?php echo "$mysecurity" ?></b></td>
        </tr>
        <tr>
             <td align="right"><span style="color:red; font-weight:bold;">Security Test: </span></td>
             <td align="left"><input name="yoursecurity" size="5" type="text"></td>
        </tr>
        <tr>
             <td colspan="2" ><font size="-1">Please type the number shown above this box to help us avoid spam. </font>
             </td>
        </tr>
        </table>
        <br />
<?php
}

function mycaptcha_test($keytest, $securitycode){
        if ( $securitycode == $keytest /2 )  return 1;
        else return 0;
}

function &forms_connect() {
  $con = mysqli_connect("dev-mysql.library.vanderbilt.edu","formadmin","up2N0-gO0D!","forms");
  if (!$con) {
    $error = die('Could not connect: ' . mysqli_connect_error($con));
    return $error;
  } else {
    return $con;
  }
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$top = '<!DOCTYPE html>
<html lang="en-us">
<head><meta charset="utf-8"><title>Vanderbilt University Library</title>
<style>
.tab {
    display: inline-block;
    margin-left: 60px;
}
</style>

<link rel="stylesheet" href="https://cdn.library.vanderbilt.edu/pwc/bootstrap4/dist/css/vul-pw-header.css">
<link rel="stylesheet" href="https://cdn.library.vanderbilt.edu/pwc/bootstrap4/dist/css/vul-pw-footer.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Source+Sans+Pro:200,300,400,700&display=swap">
<link rel="stylesheet" href="https://cdn.library.vanderbilt.edu/pwc/bootstrap3/dist/css/vul-pw-fontawesome.css">

</head>
<body>

<script src="https://cdn.library.vanderbilt.edu/pwc/bootstrap4/dist/js/vul-pw-header.js"></script>
<script src="https://cdn.library.vanderbilt.edu/pwc/bootstrap4/dist/js/vul-pw-footer.js"></script>
<script src="https://cdn.vanderbilt.edu/vu-www4/brandbar/emergency.js"></script>
<script src="https://www.library.vanderbilt.edu/assets/js/heardEmergency.js"></script>

<vul-brandbar></vul-brandbar>
<vul-header>
  <vul-navigation></vul-navigation>
  <vul-banner></vul-banner>
</vul-header>
';

$bottom = '
<script type="text/javascript">
<!--
function showDiv( id ) {
        var d = document.getElementById( id );
        d.style.display = "";
}
function hideDiv( id ) {
        var d = document.getElementById( id );
        d.style.display = "none";
}
-->
</script>

<vul-footer>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js" integrity="sha256-VrmtNHAdGzjNsUNtWYG55xxE9xDTz4gF63x/prKXKH0=" crossorigin="anonymous"></script>
</vul-footer>';

?>