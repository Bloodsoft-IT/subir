<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<HTML>
<HEAD>
    <TITLE>Casual Babies - Hurray!!!!</TITLE>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
    <script src="js/jquery/jquery.js"></script>
    <script src="js/jquery/jquery.address.js"></script>
    <script src="js/semantic/javascript/semantic.min.js"></script>

    <link href="js/semantic/css/semantic.min.css" rel="stylesheet" />

</HEAD>
<BODY>
    <div>
    	<?php include('banner.php'); ?>
    </div>
    <div class="large ui buttons">
  <div class="ui button">Cancel</div>
  <div class="ui button">Continue</div>
</div>

<div class="ui pointing secondary demo menu">
  <a class="active red item" data-tab="first">First</a>
  <a class="blue item" data-tab="second">Second</a>
  <a class="green item" data-tab="third">Third</a>
</div>
<div class="ui active tab segment" data-tab="first">First</div>
<div class="ui tab segment" data-tab="second">Second</div>
<div class="ui tab segment" data-tab="third">Third</div>


<div class="ui icon menu">
  <a class="item">
    <i class="mail icon"></i>
  </a>
  <a class="item">
    <i class="lab icon"></i>
  </a>
  <a class="item">
    <i class="star icon"></i>
  </a>
</div>



<div class="ui form">
  <div class="inline field">
    <div class="ui checkbox">
      <input type="checkbox">
      <label>Checkbox</label>
    </div>
  </div>
  <div class="inline field">
    <div class="ui slider checkbox">
      <input type="checkbox">
      <label>Slider</label>
    </div>
    <label></label>
  </div>
  <div class="inline field">
    <div class="ui toggle checkbox">
      <input type="checkbox">
      <label>Toggle</label>
    </div>
  </div>
</div>
</BODY>
</HTML>
<script>
$(document).ready(function() {
    $('.demo.menu .item')
      .tab({
        history : true,
        path    : '/introduction/getting-started.html'
      });

    $('.ui.checkbox').checkbox();
});
</script>
