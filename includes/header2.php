<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script><script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/interface.js"></script>

<!--[if lt IE 7]>
 <style type="text/css">
 div, img { behavior: url(iepngfix.htc) }
 </style>
<![endif]-->

<link href="js/style.css" rel="stylesheet" type="text/css" />

<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>

<div id="templatemo_header" style="background:#FFF; background-color:#FFF;">
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1005" height="180">
   	    <param name="movie" value="images/Web Saucer.swf" />
   	    <param name="quality" value="high" />
   	    <param name="wmode" value="opaque" />
   	    <param name="swfversion" value="9.0.45.0" />
   	    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
   	    <param name="expressinstall" value="Scripts/expressInstall.swf" />
   	    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
   	    <!--[if !IE]>-->
   	    <object type="application/x-shockwave-flash" data="images/Web Saucer.swf" width="1005" height="180">
   	      <!--<![endif]-->
   	      <param name="quality" value="high" />
   	      <param name="wmode" value="opaque" />
   	      <param name="swfversion" value="9.0.45.0" />
   	      <param name="expressinstall" value="Scripts/expressInstall.swf" />
   	      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
   	      <div>
   	        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
   	        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
   	      <!--[if !IE]>-->
    </object>
   	    <!--<![endif]-->
  </object>
</div><div id="templatemo_menu" style="background:url(images/dock-bg.png); width:1005px;"><div class="dock" id="dock">
  <div class="dock-container">
	  <a class="dock-item" href="login.php" ><img src="images/home.png" alt="home" /><span>Home</span></a> 
	  <a class="dock-item" href="#"><img src="images/services.png" style="padding-left: 20px;" alt="services" /><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Services</span></a> 
	  <a class="dock-item" href="#"><img src="images/contact us.png" style="padding-left: 30px;" alt="contctus" /><span style=" width: 90px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a> 
	  <a class="dock-item" href="#"><img src="images/membership.png" style="padding-left: 40px;" alt="membership" /><span style=" width: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Membership</span></a>  
	    </div> 
</div><script type="text/javascript">
	
	$(document).ready(
		function()
		{
			$('#dock').Fisheye(
				{
					maxWidth: 20,
					items: 'a',
					itemsText: 'span',
					container: '.dock-container',
					itemWidth: 40,
					proximity: 120,
					halign : 'center'
				}
			)
		}
	);

</script>
 </div>