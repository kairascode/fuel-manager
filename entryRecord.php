<?PHP 
echo"
<form method='POST' action=''>
<P align='center'>FUEL REGISTER</P><HR>
DATE::<input type='date' name='cdate' required>
ORDER NO::<input type='text' name='orderno' pattern=[0-9]+ maxlength='10' required>
DELIVERY NO::<input type='text' name='dvryno' pattern=[0-9]+ maxlength='10' required><br><br><HR>
LITRES DRAWN::<input type='text' name='ldrawn' pattern=[0-9]\d*(\.\d+)? maxlength='10' required>
VEHICLE NO::<input type='text' name='vno' pattern=[A-Z ]+ required><br><br><HR>
AMOUNT::<input type='text' name='amnt' pattern=[0-9]\d*(\.\d+)? required><br><br><HR>
<input type='submit' name='submit' value='RECORD ENTRY'>
</form>";


if(isset($_POST['cdate'])){$cdate=$_POST['cdate'];}
if(isset($_POST['dvryno'])){$dvryno=$_POST['dvryno'];}
if(isset($_POST['orderno'])){$orderno=$_POST['orderno'];}
if(isset($_POST['ldrawn'])){$ldrawn=$_POST['ldrawn'];}
if(isset($_POST['vno'])){$vno=$_POST['vno'];}
if(isset($_POST['amnt'])){$dbt=$_POST['amnt'];}
if(isset($_POST['desc'])){$desc=$_POST['desc'];}

include("fcon.php");

$wr=mysql_query("select Balance from fuels where no=(select max(no)from fuels)")or die("wrong");

$row=mysql_fetch_array($wr);

$minbal=$row['Balance'];

$desc='DEBIT';
$rate=$dbt/$ldrawn;
$chqno=0;
$cred=0;
//$bal=200000;

$cbal=$minbal-$dbt;

$transid=$dvryno+5;





$qr=mysql_query("insert into fuels(cdate,description,transid,orderno,deliveryno,litres,vehicleno,chequeNo,Rate,debit,credit,Balance)
 VALUES('$cdate','$desc','$transid','$orderno','$dvryno','$ldrawn','$vno','$chqno','$rate','$dbt','$cred','$cbal')");
 
 
 
 $qt=mysql_query("select*from fuels ORDER BY cdate DESC")or die(mysql_error($conn));
 echo"<table border=1 align='center'>";
 
 echo"<tr><th>ORDER DATE<th>ORDER NO<th>DELIVERY NO<th>LITRES #<th>VEHICLE #<th>RATE<th>AMOUNT<th>BALANCE<th>DATE RECORDED</th></tr>";
 while($rows=mysql_fetch_assoc($qt)){
 
 $cdates=$rows["cdate"];
 $cqno=$rows["orderno"];
 $ngapi=$rows["litres"];
 $balo=$rows["vehicleno"];
 $rrate=$rows["Rate"];
 $qty=$rows["debit"];
 $dvno=$rows["deliveryno"];
 $bl=$rows["Balance"];
 $ttime=$rows["transtime"];
 //$cdates=$rows[];
 
 echo"
 <tr><td>$cdates<td>$cqno<td>$dvno<td>$ngapi<td>$balo<td>$rrate<td>$qty<td>$bl<td>$ttime</td></tr>";
 //echo"<tr></tr>";
 }
 echo"</table>
 ";


?>