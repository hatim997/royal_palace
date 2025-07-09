<html>
<head>
<style>
.styl {
	padding:0;
	margin:auto;
	width:500px;
}
</style>
<title>Income Statement</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	$(".datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
  });
  function validate(){
  var from = encodeURIComponent(document.getElementById("limitup").value);
	var to = encodeURIComponent(document.getElementById("limit").value);
	//var banquet = encodeURIComponent(document.getElementById("banquet").value);
	//var num_rows = encodeURIComponent(document.getElementById("num_rows").value);
	
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	if(from > to)
	{
		alert("From Date must be less than To Date");
		return false;	
	}
  }
  </script>
</head>
<body>
<form action="income-statement.php" method="post" name="date"  onSubmit="return validate()">
  <h1 style="text-align:center ">Income Statement</h1>
  <div class="styl"> <strong>From:</strong>
    <input id="limitup" name="limitup" type="text" class="datepicker" />
    <strong>To:</strong>
    <input id="limit" name="limit" type="text" class="datepicker" />
    <input type="submit" name="submit" value="Submit"/>
    <br/>
    <br/>
    <!--<strong> From: </strong><select name='limitup'>
<option value="2011-08-1">August 2011</option>
<option value="2011-09-1">September 2011</option></select>
<strong>To:</strong> <select name="limit">
<option value="2012-01-1">January 2012</option></select>--> 
    
  </div>
</form>
<?php
if(isset($_POST['submit']))
{
	
	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("gapplus", $con);





?>
<table border="0" style="margin:0; padding:0;" >
  <tr>
    <td><table border="1" bgcolor="#669966" width="200px" height="520px">
        <tr>
          <th> Catagory</th>
        </tr>
        <tr>
          <th> Sales</th>
        </tr>
        <tr>
          <th> Cost of Sales</th>
        </tr>
        <tr>
          <th> Gross Profit Loss</th>
        </tr>
        <tr>
          <th> Administrative expences</th>
        </tr>
        <tr>
          <th> Selling Expences</th>
        </tr>
        <tr>
          <th> Financial Charges</th>
        </tr>
        <tr>
          <th> Other Charges</th>
        </tr>
        <tr>
          <th>&nbsp; </th>
        </tr>
        <tr>
          <th> Operating Expences</th>
        </tr>
        <tr>
          <th> Other Income</th>
        </tr>
        <tr>
          <th> Net Profit loss before tax</th>
        </tr>
        <tr>
          <th> Taxation</th>
        </tr>
        <tr>
          <th> Net Profit loss after tax</th>
        </tr>
      </table></td>
    <?php
		 
			
//var_dump($_POST[]);
$from=$_POST['limitup'];
$to=$_POST['limit'];
$end_date = $to." 23:59:59";
$date1 = strtotime($from);
$date2 = strtotime($to);
/*
$diff=$date1-$to;
if($diff<1){
	echo "Invalid date";
	}*/
$months = 1;


$my_date = explode("-", $from);
while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
    $months++;
//echo "Months are ".$months."<br>";
			//$i=$months;
			$asif=0;
	
			while($asif < $months){
				
				$start_date = date("Y-m-d", mktime(0,0,0, date($my_date[1]+$asif), date($my_date[2]), date($my_date[0])));
				$start_date = $start_date." 00:00:00";
				//Sales
				$sales=0;
				$query = "SELECT * FROM voucher_transaction
				WHERE ACCOUNT_CODE Like '07%' AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'";
				$result= mysql_query($query) or die("Error ". mysql_error()) ;
				$i=0;
				$num_rows = mysql_num_rows($result);
				while($i<$num_rows){
				
				$amount=mysql_result($result,0,"TRN_AMOUNT");
				$sales= $sales + $amount;
				$i++;
				}
				
				
//Cost of Sales
$cost_of_sales1=0;	
$result=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '08%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$j=0;
$num_rows_sale1 = mysql_num_rows($result);
while($j<$num_rows_sale1){
$amount1=mysql_result($result,0,"TRN_AMOUNT");
$cost_of_sales1= $cost_of_sales1 + $amount1;
$j++;
}
$cost_of_sales2=0;	
$result2=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '09%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$k=0;
$num_rows_sale2 = mysql_num_rows($result2);
while($k<$num_rows_sale2){
$amount2=mysql_result($result2,0,"TRN_AMOUNT");
$cost_of_sales2= $cost_of_sales2 + $amount2;
$k++;
}
$cost_of_sales=$cost_of_sales1 + $cost_of_sales2;
// PROFIT LOSS
$gross_profit_loss=0;
$gross_profit_loss=$sales - $cost_of_sales;

//Administrative Expences
$admin_expences=0;
$result3=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '10%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$l=0;
$num_rows3 = mysql_num_rows($result3);
while($l<$num_rows3){

$amount3=mysql_result($result3,0,"TRN_AMOUNT");
$admin_expences= $admin_expences + $amount3;
$l++;
}


//Selling Expences
$selling_expences=0;
$result4=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '11%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$m=0;
$num_rows4 = mysql_num_rows($result4);
while($m<$num_rows4){

$amount4=mysql_result($result4,0,"TRN_AMOUNT");
$selling_expences= $selling_expences + $amount4;
$m++;
}

//Financial Charges
$financial_charges=0;
$result5=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '12%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$n=0;
$num_rows5 = mysql_num_rows($result5);
while($n<$num_rows5){
$amount5=mysql_result($result5,0,"TRN_AMOUNT");
$financial_charges= $financial_charges + $amount5;
$n++;
}

//Other Charges
$other_charges=0;
$result6=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '13%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$p=0;
$num_rows6 = mysql_num_rows($result6);
while($p<$num_rows6){
$amount6=mysql_result($result6,0,"TRN_AMOUNT");
$other_charges= $other_charges + $amount6;
$p++;
}

//Total Charges
$total_charges=0;
$total_charges=$admin_expences + $selling_expences + $financial_charges +$other_charges;

// Operating Profit Loss
$op_profit_loss=$gross_profit_loss - $total_charges;


//Other Income
$other_income=0;
$result7=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '14%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$r=0;
$num_rows7 = mysql_num_rows($result7);
while($r<$num_rows7){
$amount7=mysql_result($result7,0,"TRN_AMOUNT");
$other_income= $other_income + $amount7;
$r++;
}

//Net Profit loss before taxation
$profit_loss_b_tax=0;
$profit_loss_b_tax= $op_profit_loss + $other_income;

//Taxation
$tax=0;
$result8=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '15%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$s=0;
$num_rows8 = mysql_num_rows($result8);
while($s<$num_rows8){
$amount8=mysql_result($result8,0,"TRN_AMOUNT");
$tax= $tax + $amount8;
$s++;
}


//Net Profit loss after taxation
$profit_loss_a_tax=0;
$profit_loss_a_tax= $profit_loss_b_tax - $tax;
//mysql_close($con);

				
				?>
    <td ><table border="1" width="100px" height="520px" bgcolor="#996633">
        <tr>
          <td><strong> <?php echo $today = date("M Y", mktime(0,0,0, date($my_date[1]+$asif), date($my_date[2]), date($my_date[0])));?></strong></td>
        </tr>
        <tr>
          <td><?php echo $sales ?></td>
        </tr>
        <tr>
          <td><?php echo $cost_of_sales ?></td>
        </tr>
        <tr>
          <td><?php echo $gross_profit_loss ?></td>
        </tr>
        <tr>
          <td><?php echo $admin_expences ?></td>
        </tr>
        <tr>
          <td><?php echo $selling_expences ?></td>
        </tr>
        <tr>
          <td><?php echo $financial_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $other_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $total_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $op_profit_loss ?></td>
        </tr>
        <tr>
          <td><?php echo $other_income ?></td>
        </tr>
        <tr>
          <td><?php echo $profit_loss_b_tax ?></td>
        </tr>
        <tr>
          <td><?php echo $tax ?></td>
        </tr>
        <tr>
          <td><?php echo $profit_loss_a_tax ?></td>
        </tr>
      </table></td>
    <?php
				$asif++;
				
				}
			
			 ?>
  </tr>
</table>
<?php
}
?>
</body>
</html>