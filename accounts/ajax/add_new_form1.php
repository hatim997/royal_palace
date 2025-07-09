<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$orderno = $_POST['orderno'];


?>
<?php
	
	$value = $_POST['value'];
	//echo $value."<br>";
	if($value == "M")
	{
		$query1 = "SELECT MAX(MAIN_ACCT_CODE) FROM main_acct_tab";
		$result1 = mysql_query($query1)or die("Failed :".mysql_error());
		$num1 = mysql_numrows($result1);
		$i=0;
		while($i < $num1)
		{
			$trans_id = mysql_result($result1,$i, "MAX(MAIN_ACCT_CODE)" );
			$i++;
		}
		//$trans_id++;
		$length = strlen($trans_id);
		//echo $length;
		//$trans_id1 = array();
		$concate = "";
		for($i = 0; $i < $length; $i++)
		{
			//echo "Value is ".substr($trans_id, $i, 1)."<br>";
			$character = substr($trans_id, $i, 1);
			if($character == 0)
			{
				$concate = $concate.$character;
			}
			else
			{
				break;
			}
		}
		$trans_id++;
		$trans_id = $concate.$trans_id;
		
		echo '<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Opening</strong></td>
    </tr>
    </table>
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>  
    <tr>
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148">&nbsp;</td>
    </tr>
    <tr>
    	<td width="122">&nbsp;<input type="text" size="10" name="main_code" id="main_code" value="'.$trans_id.'" /></td>
        <td width="144"><input type="text" size="15" name="main_title" id="main_title" /></td>
        <td width="122"><input type="text" size="10" value="Control Code" disabled="disabled" /></td>
        <td width="130"><input type="text" size="15" value="Control Title" disabled="disabled" /></td>
        <td width="130" align="center"><input type="text" size="10" value="Category 1 Code" disabled="disabled" /></td>
        <td width="141"><input type="text" size="15" value="Category 1 Title" disabled="disabled" /></td>
        <td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td>
        <td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td>
        <td width="148"><input type="text" size="15" value="opening" disabled="disabled" /></td>
    </tr>
    <tr style="height:50px;">
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148"><a href="javascript:add_main()" alt="Add" title="Add">
        <img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
  </table>';
	}
	else if($value == "C")
	{	
		echo '<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Opening</strong></td>
    </tr>
    </table>
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>  
    <tr>
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148">&nbsp;</td>
    </tr>
    <tr>
    	<td width="122">&nbsp;<input type="text" size="10" name="main_code" id="main_code" /></td>
        <td width="144">
		<select name="main" id="main" style="width:130px;" onchange="main_code(this.value);">
		  <option value="">Select Main</option>';
		  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
		  $result = mysql_query($query);
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
			  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
			  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
			  $i++;
		  }  // while loop ends here
		echo '</select></td>
        <td width="122"><input type="text" size="10" name="ctrl_code" id="ctrl_code" /></td>
        <td width="130"><input type="text" size="15" name="ctrl_title" id="ctrl_title" /></td>
        <td width="130" align="center"><input type="text" size="10" value="Category 1 Code" disabled="disabled" /></td>
        <td width="141"><input type="text" size="15" value="Category 1 Title" disabled="disabled" /></td>
        <td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td>
        <td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td>
        <td width="148"><input type="text" size="15" value="opening" disabled="disabled" /></td>
    </tr>
    <tr style="height:50px;">
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148"><a href="javascript:add_ctrl();" alt="Add" title="Add">
        <img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
  </table>';
	}
	else if($value == "C1")
	{	
		echo '<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Opening</strong></td>
    </tr>
    </table>
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>  
    <tr>
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148">&nbsp;</td>
    </tr>
    <tr>
    	<td width="122">&nbsp;<input type="text" size="10" name="main_code" id="main_code" /></td>
        <td width="144">
		<select name="main" id="main" style="width:130px;" onchange="show_control2(this.value);">
		  <option value="">Select Main</option>';
		  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
		  $result = mysql_query($query);
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
			  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
			  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
			  $i++;
		  }  // while loop ends here
		echo '</select></td>
        <td width="122"><input type="text" size="10" name="ctrl_code" id="ctrl_code" /></td>
        <td width="130" id="show_control"><input type="text" size="15" name="ctrl_title" id="ctrl_title" /></td>
        <td width="130" align="center"><input type="text" size="10" name="scat_code" id="scat_code" /></td>
        <td width="141"><input type="text" size="15" name="scat_title" id="scat_title" /></td>
        <td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td>
        <td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td>
        <td width="148"><input type="text" size="15" value="opening" disabled="disabled" /></td>
    </tr>
    <tr style="height:50px;">
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148"><a href="javascript:add_scat1();" alt="Add" title="Add">
        <img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
  </table>';
	}
	else
	{	
		echo '<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Opening</strong></td>
    </tr>
    </table>
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>  
    <tr>
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148">&nbsp;</td>
    </tr>
    <tr>
    	<td width="122">&nbsp;<input type="text" size="10" name="main_code" id="main_code" /></td>
        <td width="144">
		<select name="main" id="main" style="width:130px;" onchange="show_control3(this.value);">
		  <option value="">Select Main</option>';
		  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
		  $result = mysql_query($query);
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
			  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
			  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
			  $i++;
		  }  // while loop ends here
		echo '</select></td>
        <td width="122"><input type="text" size="10" name="ctrl_code" id="ctrl_code" /></td>
        <td width="130" id="show_control"><input type="text" size="15" name="ctrl_title" id="ctrl_title" /></td>
        <td width="130" align="center"><input type="text" size="10" name="scat_code" id="scat_code" /></td>
        <td width="141" id="show_category1"><input type="text" size="15" name="scat_title" id="scat_title" /></td>
        <td width="127" align="center"><input type="text" size="10" name="scat2_code" id="scat2_code" /></td>
        <td width="136"><input type="text" size="15" name="scat2_title" id="scat2_title" /></td>
        <td width="148"><input type="text" size="15" id="opening" value="0.00" /></td>
    </tr>
    <tr style="height:50px;">
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148"><a href="javascript:add_scat2();" alt="Add" title="Add">
        <img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
  </table>';
	}
?>