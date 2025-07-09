<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Action</strong></td>
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
    	<td width="122">&nbsp;<input type="text" size="10" value="Main Code" disabled="disabled" /></td>
        <td width="144"><input type="text" size="15" value="Main Title" disabled="disabled" /></td>
        <td width="122"><input type="text" size="10" value="Control Code" disabled="disabled" /></td>
        <td width="130"><input type="text" size="15" value="Control Title" disabled="disabled" /></td>
        <td width="130" align="center"><input type="text" size="10" value="Category 1 Code" disabled="disabled" /></td>
        <td width="141"><input type="text" size="15" value="Category 1 Title" disabled="disabled" /></td>
        <td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td>
        <td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td>
        <td width="148"><a href="javascript:save_form()" alt="Add" title="Add"><img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
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
  </table>