<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

<script language="JavaScript">
	new tcal ({
		'formname': 'ingredient',
		'controlname': 'transaction_date'
	});
	</script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	color: #013c54
}
.style8 {color: #FF0000; font-style: italic; }

h2 {
	margin: 0px;
	padding: 0px 0px 0px 0px;
	font-size: 15px;
	font-weight: bold;
	color:#013c54;
}


-->
</style>
<style type="text/css">
/*- Menu 2--------------------------- */
	
#menu2 {
	width: 225px;
	margin: -20px;
	border-color: #D8D5D1;
	
	}
	
#menu2 li a {
  	voice-family: "\"}\""; 
  	voice-family: inherit;
  	height: 18px;
	text-decoration: none;
	}	
	
#menu2 li a:link, #menu2 li a:visited {
	color: #013c54;
	display: block;
	background:url(EBmenus/Vertical%20Menus/menu2.png);
	padding: 4px 0 0 30px;
		}
	
#menu2 li a:hover {
	color: #FFFFFF;
	background:  url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
	padding: 8px 0 0 32px;
	}
	.style3 {
	color: #013c54;
	font-size: 12px;
}
</style>

<style>
body {
	background-color: #ffffff;
	padding:0;
	margin:0 auto;
	
	font-size:12px;
}
</style>


<script type="text/javascript">
    function supplier_item(value)
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		if (value == "")
  		{
			document.getElementById("supplier_item").innerHTML="";
			//alert("Please select correct status.");
			return;
  		}
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		document.getElementById("supplier_item").innerHTML= '<div align="center"><img src="images/ajax-loader.gif" alt="Loading Please wait....." title="Loading Please wait....." /></div>';
		xmlhttp.onreadystatechange=function()
		  {
		  /*if (xmlhttp.readyState==3)
			{
				document.getElementById("supplier_item").innerHTML= '<img src="ajax-loader.gif />"';
			}
		  else */if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("supplier_item").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/show_supplier_item.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
		}
</script>

<script type="text/javascript">
    function show_ingredient(value)
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		if (value == "")
  		{
			document.getElementById("show_ingredient").innerHTML="";
			//alert("Please select correct status.");
			return;
  		}
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("show_ingredient").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/show_ingredient_demand.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
		}
</script>

<script type="text/javascript">
function add_demand(form)
{
	//alert("Hello");
	var d_id = "";
	var d_demand = "";
	var blank = 0;
	var demand = "";
	//var guest = encodeURIComponent(document.getElementById("guest").value);
	var date = encodeURIComponent(document.getElementById("transaction_date").value);
	var supplier = encodeURIComponent(document.getElementById("supplier").value);
	var total_ing = encodeURIComponent(document.getElementById("total_ing").value);
	//var serving = encodeURIComponent(document.getElementById("serving").value);
	//var qty = encodeURIComponent(document.getElementById("qty").value);
	//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
	//alert("Total Dishes are "+t_dish);
	if(date == "")
	{
		alert("Please select valid date");
		return;
	}
	if(supplier == "")
	{
		alert("Please select valid supplier");
		return;
	}
	for(var i=0; i < total_ing; i++)
	{
		var demand = encodeURIComponent(document.getElementById("demand"+i).value);
		//alert(qty);
		//alert("Name is "+encodeURIComponent(document.getElementById("demand"+i).name));
		if(demand != "")
		{
			if(d_id == "")
			{
				d_id +=encodeURIComponent(document.getElementById("demand"+i).name);
			}
			else
			{
				d_id = d_id + ":" + encodeURIComponent(document.getElementById("demand"+i).name);
			}
			if(d_demand == "")
			{
				d_demand +=encodeURIComponent(document.getElementById("demand"+i).value);
			}
			else
			{
				d_demand = d_demand + ":" + encodeURIComponent(document.getElementById("demand"+i).value);
			}
			//alert(d_id+" and quntities are "+d_demand);
		}
		else
		{
			blank = blank + 1;	
		}
		//alert("Blank is "+blank);
	}
	if(total_ing == blank)
	{
		alert("Please enter valid Quantity");
		return;
	}
	//alert(d_id+" and quntities are "+d_qty);
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var frm_elements = form.elements;
			for (i = 0; i < frm_elements.length; i++)
			{
				field_type = frm_elements[i].type.toLowerCase();
				switch (field_type)
				{
				case "text":
				case "password":
				case "textarea":
				//case "hidden":
					frm_elements[i].value = "";
					break;
				case "radio":
				case "checkbox":
					if (frm_elements[i].checked)
					{
						frm_elements[i].checked = false;
					}
					break;
				case "select-one":
				case "select-multi":
					frm_elements[i].selectedIndex = 0;
					break;
				default:
					break;
				}
			}
			document.getElementById("inventory_new").innerHTML=xmlhttp.responseText;
			document.getElementById("supplier_item").innerHTML="";
		}
	  }
	xmlhttp.open("POST","ajax/add_demand_supplier.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("total_ing="+total_ing+"&d_id="+d_id+"&d_demand="+d_demand+"&date="+date+"&supplier="+supplier);
}
</script>

</head>

<body>
<div id="templatemo_container">


   
    <?php include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
        
<h1 class="style1" style="font-size:16px;">Store Demand to Supplier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
<br>
            
            <div id="inventory">
            <div id="inventory_new">
            </div>
            <form name="ingredient" id="ingredient">
            <table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="140">Transaction Date:</td>
    <td width="246"><input type="text" class="tcal" id="transaction_date" name="transaction_date" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Select Supplier:</td>
    <td width="246"><select id="supplier" name="supplier" onchange="supplier_item(this.value)">
  		<option value="">Select Supplier</option>
			<?php
            
                $query = "SELECT * FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_NAME ASC";
                $result = mysql_query($query)or die("Failed :".mysql_error());
                $num = mysql_numrows($result);
                $i=0;
                while($i < $num)
                {
                    $unit_detail = mysql_result($result,$i, "SUPPLIER_NAME");
                    $unit_id = mysql_result($result,$i, "SUPPLIER_ID");
            ?>
              <option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
            <?php
                
                $i++;
                }  // while loop ends here
                
            ?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="supplier_item" align="center">
  
  </div>
  
  <table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="254"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>
</div>
            <br>
        </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        <div id="templatemo_right_column" style="padding-top: 1px;"> 
  </div>
        
      <!-- end of right column -->
    
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>