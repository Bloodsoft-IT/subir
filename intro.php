<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
include_once("constants.php");

$home = Constants::getHome();
?>
<HTML>
<HEAD>
    <TITLE>Casual Babies - Hurray!!!!</TITLE>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/intro.css" rel="stylesheet" />
    
    <link href="js/semantic/css/semantic.min.css" rel="stylesheet" />

    <script src="js/jquery/jquery.js"></script>
    <script src="js/semantic/javascript/tablesort.js"></script>
    <script src="js/semantic/javascript/waypoints.js"></script>

    <script src="js/semantic/javascript/semantic.min.js"></script>
    <script src="js/semantic/javascript/semantic.js"></script>
    <script src="js/semantic/javascript/menu.js"></script>
    <link rel="stylesheet" href="js/jquery/jquery-ui.css">
    <script src="js/jquery/jquery-ui.js"></script><!-- 1.11.1 -->

</HEAD>
<BODY id="mybody">
    <?php include('analytics.php'); ?>
    <div>
        <?php include('banner.php'); ?>
    </div>

    <?php include('registration-page.php'); ?>
    <?php include('login-page.php'); ?>
    <div class="ui large menu" style="margin: 0px;">
      <a class="active green item" id="cbhome">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="large home icon"></i>&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;
      </a>
      <a class="red item" id="explain-working">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="large info icon"></i>&nbsp;&nbsp;How It Works&nbsp;&nbsp;&nbsp;&nbsp;
      </a>
      <a class="blue item" id="cblogin">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="large user icon"></i>&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;
      </a>
      <a class="purple item" id="cbregister">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="large hand right icon"></i>&nbsp;&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;
      </a>
    </div>
</BODY>
</HTML>
<script>
var images = [
    "media/images/background1.jpg",
    "media/images/background2.jpg"
];
var colors = ['#56802D', '#68657E', '#689598', '#5D6B7E', '#6A546F'];
$(document).ready(function() {
    $(document).ready(function() {
        $('#cbhome').click(function() {
            window.location = "<?php print $home ?>";
        });
    });
    //var image = images[(Math.floor((Math.random()*10)+1) % images.length)];
    var color = colors[(Math.floor((Math.random()*10)+1) % colors.length)];
    //$('body').css('background-image', 'url("' + image + '")');
    $('body').css('background-color', color);
    $('#underline').css('background-color', color);

    $('#login').sidebar('hide');
    $('#register').sidebar('hide');
    $('#cbregister').click(function() {
        $('#register').sidebar('toggle');
    });
    $('#cblogin').click(function() {
        $('#login').sidebar('toggle');
    });
    $('.ui.dropdown').dropdown();
    
    
    $('#dof').focusin(function(){
    	 $('#dof').datepicker({
		changeMonth: true,
		changeYear: true
	});
    });
    
    $('#close').click(function(){
    	$('#register').sidebar('toggle');
    });
    
});
</script>
