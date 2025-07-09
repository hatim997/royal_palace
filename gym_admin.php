<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Hotel Royal Palace</title>
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

</head>

<body>
  <div id="main">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="#">Gym</a>
        <ul>
          <li><a href="gym_token.php">New Token</a></li>
        </ul>
      </li>
      <li><a href="#">Membership</a>

        <ul>
          <li><a href="gym_reg_form.php">New Member</a></li>
          <li><a href="gym_mem_type.php">Add/Edit Membership Type</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">Charges Plan</a>
        <ul>
          <li><a href="gym_charges.php">Charges Plan</a></li>

        </ul>
      </li>

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