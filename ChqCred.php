<?php
echo"
<form method='POST' action=''>
<P align='center'>DEPOSITS</P><HR>
DATE::<input type='DATE' name='cdate' required><br><br><hr>
CHEQUE NO::<input type='text' name='chqno' pattern=[0-9]+ maxlength='10' required><br><br><hr>
AMOUNT::<input type='text' name='amnt' required><br><br><hr>
<input type='submit' name='submit' value='RECHARGE ACCOUNT'><br><br>
</form>";


if(isset($_POST['cdate'])){$cdate=$_POST['cdate'];}
if(isset($_POST['desc'])){$desc=$_POST['desc'];}
if(isset($_POST['chqno'])){$chqno=$_POST['chqno'];}
if(isset($_POST['amnt'])){$cred=$_POST['amnt'];}


$desc='CREDIT';
$ldrawn=0;
$vno='-';

$orderno=0;
include("fcon.php");

$wr=mysql_query("select Balance from fuels where no=(select max(no) from fuels)")OR DIE("WROO");

$row=mysql_fetch_array($wr);

$minbal=$row['Balance'];

$rate=0;
$dbt=0;



$cbal=$minbal+$cred;

$dd=$chqno+10;

$transid=$chqno+15;

echo"$ces";


$q=mysql_query("insert into fuels(cdate,description,transid,orderno,deliveryno,litres,vehicleno,chequeNo,Rate,debit,credit,Balance)
 VALUES('$cdate','$desc','$transid','$orderno','$dd','$ldrawn','$vno','$chqno','$rate','$dbt','$cred','$cbal')");
 
 $qt=mysql_query("select*from fuels ORDER BY cdate DESC")or die(mysql_error($conn));
 echo"<table border=1 align='center'>";
 
 echo"<tr><th>RAISE DATE<th>TRANSACTION<th>TIME COMMITTED<th>DELIVERY#<th>CHEQUE #<th>DEBIT<th>AMOUNT<th>RESULTING BALANCE</th></tr>";
 while($rows=mysql_fetch_assoc($qt)){
 
 $cdates=$rows["cdate"];
 $cqno=$rows["chequeNo"];
 $tran=$rows["description"];
 $ords=$rows["deliveryno"];
 $ngapi=$rows["credit"];
 $balo=$rows["Balance"];
 $debit=$rows["debit"];
 $ttime=$rows["transtime"];
 //$cdates=$rows[];
 
 echo"
 <tr><td>$cdates<td>$tran<td>$ttime<td>$ords<td>$cqno<td>$debit<td>$ngapi<td>$balo</td></tr>";
 //echo"<tr></tr>";
 }
 echo"</table>
 ";

 ?>