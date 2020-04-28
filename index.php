<html>
<title>::::SRVR FUEL MANAGER:::</title>
<head>
<link rel="stylesheet" type="text/css" a href="forms.css">
</head>
<body id="container">
<div id="tops">MY FUEL MANAGER</div>
<div id="aside">
<a href="index.php?cat=record" title="record"> &nbsp;RECORD ENTRY </a>&nbsp
<a href="index.php?cat=receive" title="receive"> &nbsp;CREDIT CHEQUE </a><br /><br />
</div>
<div id="view">

<?php

if(isset($_GET['cat'])){$cat=$_GET['cat'];}

switch($cat){
	
case"record";
include("entryRecord.php");
break;

case"receive";

include("ChqCred.php");
break;
}
?>
</div>
<div id="footers">
<p align="center">ALL RIGHTS RESERVED &copy<?php $Today = date('m:d:y'); $new = date('Y', strtotime($Today));
								echo $new;?> <br>
<p align="center">MY FUEL MANAGER HAS BEEN DESIGNED AND DEVELOPED BY ALEX KAIRA</p>
</div>
</body>
</html>