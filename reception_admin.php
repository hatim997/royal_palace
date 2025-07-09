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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel Royal Palace</title>
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <link type="text/css" rel="stylesheet" media="all" href="style.css" />-->
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		#updates {
			float: right;
			padding-right: 20;
			padding-left: 20;
			padding-top: 20;
			margin-top: 20;
			margin-right: 30;
			border: ridge;
			width: 180;
			border-color: #333;
			background: #DFDFDF;

		}
	</style>

	<script type="text/javascript">
		var clicked = false;

		function CheckBrowser() {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
			if (clicked == false) {
				//alert("Browser closed");
				var xmlhttp;

				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("none").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "logout.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send();
			} // if ends here
		}
	</script>
	<script>
		// Call the yourAjaxCall()
		// function every 10000 millisecond
		setInterval("unread_updates()", 1000);

		function unread_updates() {
			var xmlhttp;

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("updates").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "unread_updates.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
</head>

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()">
	<div id="main">
		<ul id="MenuBar1" class="MenuBarHorizontal">
			<li><a href="rooms_booking.php">Room Booking</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
				imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
				imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
			});
		</script>
	</div>
	<div id="updates">


	</div>
	<div id="process">

	</div>

	<script type="text/javascript">
		/*
		 * stickyfloat - jQuery plugin for verticaly floating anything in a constrained area
		 *
		 * Example: jQuery('#menu').stickyfloat({duration: 400});
		 * parameters:
		 *         duration     - the duration of the animation
		 *        startOffset - the amount of scroll offset after it the animations kicks in
		 *        offsetY        - the offset from the top when the object is animated
		 *        lockBottom    - 'true' by default, set to false if you don't want your floating box to stop at parent's bottom
		 * $Version: 05.16.2009 r1
		 * Copyright (c) 2009 Yair Even-Or
		 * vsync.design@gmail.com
		 */

		$.fn.stickyfloat = function(options, lockBottom) {
			var $obj = this;
			var parentPaddingTop = parseInt($obj.parent().css('padding-top'));
			var startOffset = $obj.parent().offset().top;
			var opts = $.extend({
				startOffset: startOffset,
				offsetY: parentPaddingTop,
				duration: 200,
				lockBottom: true
			}, options);

			$obj.css({
				position: 'static'
			});

			if (opts.lockBottom) {
				var bottomPos = $obj.parent().height() - $obj.height() + parentPaddingTop; //get the maximum scrollTop value
				if (bottomPos < 0)
					bottomPos = 0;
			}

			$(window).scroll(function() {
				$obj.stop(); // stop all calculations on scroll event

				var pastStartOffset = $(document).scrollTop() > opts.startOffset; // check if the window was scrolled down more than the start offset declared.
				var objFartherThanTopPos = $obj.offset().top > startOffset; // check if the object is at it's top position (starting point)
				var objBiggerThanWindow = $obj.outerHeight() < $(window).height(); // if the window size is smaller than the Obj size, then do not animate.

				// if window scrolled down more than startOffset OR obj position is greater than
				// the top position possible (+ offsetY) AND window size must be bigger than Obj size
				if ((pastStartOffset || objFartherThanTopPos) && objBiggerThanWindow) {
					var newpos = ($(document).scrollTop() - startOffset + opts.offsetY);
					if (newpos > bottomPos)
						newpos = bottomPos;
					if ($(document).scrollTop() < opts.startOffset) // if window scrolled < starting offset, then reset Obj position (opts.offsetY);
						newpos = parentPaddingTop;

					$obj.animate({
						top: newpos
					}, opts.duration);
				}
			});
		};

		$('#updates').stickyfloat({
			duration: 200
		});
	</script>
</body>

</html>